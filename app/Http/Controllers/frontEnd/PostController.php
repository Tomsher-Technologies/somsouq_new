<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\State;
use App\Services\Front\CategoryWiseDetailViewService;
use App\Services\Front\CategoryWisePostDetailDataService;
use App\Services\Front\CategoryWisePostDetailDeleteService;
use App\Services\Front\ImageUploadService;
use App\Services\Front\LoadCategoryWiseDetailFormService;
use App\Services\Front\CategoryWisePostDetailStoreService;
use App\Services\Front\CategoryNameService as CATEGORY_NAME;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

final class PostController extends Controller
{
    public function create()
    {
        try {
            $data['categories'] = Category::where('parent_id', 0)->where('is_active', 1)->get(['id', 'en_name', 'icon']);
            $data['states'] = State::where('status', 1)->pluck('name', 'id');

            return view('frontEnd.post.create', $data);
        }catch (\Exception $exception){
            abort('404', $exception->getMessage());
        }
    }

    public function AppStore(Request $request)
    {
        DB::beginTransaction();
        try {
            $post = Post::findOrNew($request->get('post_id') ?? "");
            $post->category_id = $request->get('category_id');
            $post->sub_category_id = $request->get('sub_category_id');
            $post->state_id = $request->get('state_id');
            $post->city_id = $request->get('city_id');
            $post->title = $request->get('title');
            $post->price = $request->get('price');
            $post->description = $request->get('description');
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
            }

            DB::commit();
            return redirect()->back()->with('success', 'Post created successfully');
        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong at line number'. $exception->getLine());
        }catch (\Illuminate\Database\QueryException $e){
            return redirect()->back()->with('error', 'Something went wrong at line number'. $e->getLine());
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
            $data['categories'] = Category::where('parent_id', 0)->where('is_active', 1)->get(['id', 'en_name', 'icon']);
            $data['states'] = State::where('status', 1)->pluck('name', 'id');
            $data['post'] = Post::find($postId);
            $data['postDetail'] = CategoryWisePostDetailDataService::getData(categoryId: $data['post']->category_id, postId: $postId);
            $data['images'] = ImageUploadService::getPostImage(postId: $postId);


            return view('frontEnd.post.edit', $data);
        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Something went wrong at line number'. $exception->getLine());
        }
    }

    public function view(int $postId)
    {
        try {
            $data['post'] = Post::leftJoin('states', 'states.id', '=', 'posts.state_id')
                ->leftJoin('cities', 'cities.id', '=', 'posts.city_id')
                ->where('posts.id', $postId)
                ->first([
                    'posts.*',
                    'states.name as state',
                    'cities.name as city',
                ]);

            $data['postDetail'] = CategoryWisePostDetailDataService::getData(categoryId: $data['post']->category_id, postId: $postId);
            $data['images'] = ImageUploadService::getPostImage(postId: $postId);

            $getPostDetail = CategoryWiseDetailViewService::getView(categoryId: $data['post']->category_id, subCategoryId: $data['post']->sub_category_id,postId: $postId);
            $data['postDetailHtml'] = view($getPostDetail['file_path'], $getPostDetail['data'])->render();

            return view('frontEnd.post.view', $data);
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

                return redirect()->back()->with('success', 'Post deleted successfully');
            }
            return redirect()->back()->with('error', 'Post not found');
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

    protected function generateTrackingNumber(int $postId, int $category_it): string
    {
        $trackingPrefix = 'AD-' . date("dmY") . $category_it;
        return DB::statement("update  posts, posts as table2  SET posts.tracking_number=(
                            select concat('$trackingPrefix',
                                    LPAD( IFNULL(MAX(SUBSTR(table2.tracking_number,-4,4) )+1,1),4,'0')
                                          ) as tracking_number
                             from (select * from posts) as table2
                             where table2.category_id ='$category_it' and table2.id!='$postId' and table2.tracking_number like '$trackingPrefix%'
                        )
                      where posts.id='$postId' and table2.id='$postId'");
    }


}
