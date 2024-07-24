<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Libraries\LaravelShare;
use App\Models\Category;
use App\Models\Post;
use App\Models\SafetyTip;
use App\Models\State;
use App\Services\Front\CategoryWiseDetailViewService;
use App\Services\Front\CategoryWisePostDetailDataService;
use App\Services\Front\CategoryWisePostDetailDeleteService;
use App\Services\Front\ImageUploadService;
use App\Services\Front\LoadCategoryWiseDetailFormService;
use App\Services\Front\CategoryWisePostDetailStoreService;
use App\Services\Front\CategoryNameService as CATEGORY_NAME;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

final class PostController extends Controller
{
    public function create()
    {
        try {
            $data['categories'] = Category::where('parent_id', 0)->where('is_active', 1)->get(['id', 'en_name', 'ar_name', 'so_name','icon']);
            $data['states'] = State::where('status', 1)->get(['name', 'id']);

            return view('frontEnd.post.create', $data);
        }catch (\Exception $exception){
            abort('404', $exception->getMessage());
        }
    }

    public function AppStore(Request $request)
    {
//        dd($request->all());
        DB::beginTransaction();
        $data = [];
        try {
            $post = Post::findOrNew($request->get('post_id') ?? "");
            $post->category_id = $request->get('category_id');
            $post->sub_category_id = $request->get('sub_category_id');
            $post->state_id = $request->get('state_id');
            $post->city_id = $request->get('city_id');

            $post->title = setTranslation([
                'en' => $request->get('title_en'),
                'ar' => $request->get('title_ar'),
                'so' => $request->get('title_so'),
            ]);

            $post->price = $request->get(CategoryWisePostDetailStoreService::setInputName('price'));

            $post->description = setTranslation([
                'en' => $request->get('description_en'),
                'ar' => $request->get('description_ar'),
                'so' => $request->get('description_so'),
            ]);

            if ($request->get('input_type') == "add") {
                $post->status = 'pending';
            }

            $post->save();

            //Delete images which are previously added for the post
            if ($request->get('input_type') == "edit" && $request->get('upload_file_ids')) {
                ImageUploadService::deletePostImageForEdit(postId: $request->get('post_id'), uploadIds: $request->get('upload_file_ids'));
            }

            //upload file if file is exist
            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $key => $file) {
                    ImageUploadService::fileUpload(file: $request->file('file')[$key], postId: $post->id);
                }
            }

            //delete previous category wise post detail
            if ($request->get('input_type') == "edit" && ($this->getCategoryNameById($request->get('category_id')) != $this->getCategoryNameById($request->get('previous_category_id')))) {
                CategoryWisePostDetailDeleteService::deletePostDetail(categoryId: $request->get('previous_category_id'), postId: $request->get('post_id'));
            }

            //category wise details data store and update
            CategoryWisePostDetailStoreService::storePostDetails(request: $request->all(), postId: $post->id);

            //generate unique tracking number for each post
            if ($request->get('input_type') == "add") {
                $this->generateTrackingNumber(postId: $post->id, category_it: $request->get('category_id'));

                $data = [
                    'status' => 'success',
                    'method' => 'add',
                    'url' => route('my-account.index'),
                    'home_url' => route('home'),
                ];
            }

            if ($request->get('input_type') == "edit") {
                $data = [
                    'status' => 'success',
                    'method' => 'edit',
                    'url' => route('my-account.index'),
                    'home_url' => route('home'),
                ];
            }

            DB::commit();
            return response()->json($data);

        }catch (\Exception $exception){

            dd($exception->getMessage());
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'cancel_url' => route('post.create'),
            ]);
        }catch (\Illuminate\Database\QueryException $e){
            return response()->json([
                'status' => 'error',
                'cancel_url' => route('post.create'),
            ]);
        }
    }

    /**
     * load category wise details page
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadCategoryDetailForm(Request $request)
    {
        try {
            $html = LoadCategoryWiseDetailFormService::getCategoryWiseHtml(categoryId: $request->input('category_id'), subCategoryId: $request->input('sub_category_id'), postId: $request->input('post_id'));

            if (in_array("", $html)) {
                return response()->json([
                    'status' => true,
                    'message' => 'form not found'
                ]);
            } else {
                return response()->json([
                    'status' => true,
                    'html' => view($html['file_path'], $html['data'])->render()
                ]);
            }

        }catch (\Exception $exception){
            return response()->json([
                'status' => false,
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function edit(int $postId)
    {
        try {
            $data['categories'] = Category::where('parent_id', 0)->where('is_active', 1)->get(['id', 'en_name', 'ar_name', 'so_name', 'icon']);
            $data['states'] = State::where('status', 1)->get(['name', 'id']);
            $data['post'] = Post::find($postId);
//            $data['postDetail'] = CategoryWisePostDetailDataService::getData(categoryId: $data['post']->category_id, postId: $postId);
            $data['images'] = ImageUploadService::getPostImage(postId: $postId);


            return view('frontEnd.post.edit', $data);
        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Something went wrong at line number'. $exception->getLine());
        }
    }

    public function view(string $viewType, int $postId)
    {
        try {
            $data['post'] = Post::leftJoin('states', 'states.id', '=', 'posts.state_id')
                ->leftJoin('cities', 'cities.id', '=', 'posts.city_id')
                ->leftJoin('categories', 'categories.id', '=', 'posts.category_id')
                ->where('posts.id', $postId)
                ->first([
                    'posts.id',
                    'posts.title',
                    'posts.price',
                    'posts.tracking_number',
                    'posts.category_id',
                    'posts.sub_category_id',
                    'posts.updated_at',
                    'posts.created_by',
                    'posts.created_at',
                    'posts.description',
                    'posts.status',
                    'states.name as state',
                    'cities.name as city',
                    'categories.id as category_id',
                ]);

            //$data['postDetail'] = CategoryWisePostDetailDataService::getData(categoryId: $data['post']->category_id, postId: $postId);
            $data['images'] = ImageUploadService::getPostImage(postId: $postId);

            $getPostDetail = CategoryWiseDetailViewService::getView(categoryId: $data['post']->category_id, subCategoryId: $data['post']->sub_category_id,postId: $postId, viewType: $viewType);

            $data['postDetailHtml'] = view($getPostDetail['file_path'], $getPostDetail['data'])->render();

            if ($viewType == 'public') {
                $data['safetyTips'] = SafetyTip::where('category_id', $data['post']->category_id)->where('is_active', 1)->get();

                return view('frontEnd.post.public-view', $data);
            } elseif ($viewType == 'user') {
                return view('frontEnd.post.view', $data);
            }

        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Something went wrong at line number'. $exception->getLine());
        }
    }

    public function destroy(int $postId)
    {
        try {
            $post = Post::find($postId);
            if ($post) {
                CategoryWisePostDetailDeleteService::deletePostDetail(categoryId: $post->category_id, postId: $postId);
                ImageUploadService::deletePostImage(postId: $postId);
                $post->delete();

                return redirect()->back()->with('success', trans('messages.withdraw_success'));
            }
            return redirect()->back()->with('error', trans('messages.post_not_found'));
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    protected function getCategoryNameById(int $categoryId = null): string|null
    {
        $category_name = '';
        switch ($categoryId) {
            case CATEGORY_NAME::PROPERTY_FOR_RENT:
            case CATEGORY_NAME::PROPERTY_FOR_SALE:
            $category_name = "property";
                break;
            case CATEGORY_NAME::VEHICLE_FOR_RENT:
            case CATEGORY_NAME::VEHICLE_FOR_SALE:
            $category_name = "vehicle";
                break;
            default:
                break;
        }
        return $category_name;
    }

    public function sold(int $postId)
    {
        try {
            $post = Post::find($postId);
            $post->status = 'sold';
            $post->save();

            return redirect()->back()->with('success', trans('messages.sold_success'));
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    protected function generateTrackingNumber(int $postId, int $category_it): string
    {
        $trackingPrefix = 'SOM-' . date("dmY") . $category_it;
        return DB::statement("update  posts, posts as table2  SET posts.tracking_number=(
                            select concat('$trackingPrefix',
                                    LPAD( IFNULL(MAX(SUBSTR(table2.tracking_number,-4,4) )+1,1),4,'0')
                                          ) as tracking_number
                             from (select * from posts) as table2
                             where table2.category_id ='$category_it' and table2.id!='$postId' and table2.tracking_number like '$trackingPrefix%'
                        )
                      where posts.id='$postId' and table2.id='$postId'");
    }


    public function socialShareLink(Request $request)
    {
        try {
            $route = route('public.view', ['type' => 'public', 'id' => $request->get('post_id')]);
            $social_links = new LaravelShare($route);
            $all_links = $social_links->facebook()
                ->whatsapp()
                ->getLinks();

            return response()->json([
                'status' => 'success',
                'data' => $all_links,
                'url' => $route
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ]);
        }
    }

}
