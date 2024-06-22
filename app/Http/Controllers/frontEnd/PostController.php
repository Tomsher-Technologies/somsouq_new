<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\State;
use App\Services\Front\ImageUploadService;
use App\Services\Front\LoadCategoryWiseDetailFormService;
use App\Services\Front\PostCategoryWiseDetailService;
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
            dd($exception->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $post = new Post();
            $post->category_id = $request->get('category_id');
            $post->sub_category_id = $request->get('sub_category_id');
            $post->state_id = $request->get('state_id');
            $post->city_id = $request->get('city_id');
            $post->title = $request->get('title');
            $post->price = $request->get('price');
            $post->description = $request->get('description');
            $post->save();

            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $key => $file) {
                    ImageUploadService::fileUpload(file: $request->file('file')[$key], postId: $post->id);
                }
            }

            //category wise details data store
            PostCategoryWiseDetailService::storePostDetails(request: $request->all(), postId: $post->id);

            $this->generateTrackingNumber(postId: $post->id, category_it: $request->get('category_id'));

            DB::commit();
            return redirect()->back();

        }catch (\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage());
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
            $html = LoadCategoryWiseDetailFormService::getCategoryWiseHtml(categoryId: $request->input('category_id'), subCategoryId: $request->input('sub_category_id'));

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
