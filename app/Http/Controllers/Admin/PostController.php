<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\SafetyTip;
use App\Services\Front\CategoryWiseDetailViewService;
use App\Services\Front\ImageUploadService;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\StateTranslation;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index','store','edit','update','destroy','updateStatus']]);
    }

    public function index(Request $request)
    {
        try {
            $query = Post::query();
            $query->leftJoin('categories', 'posts.category_id', '=', 'categories.id')
                ->leftJoin('categories as sub_category', 'posts.sub_category_id', '=', 'sub_category.id')
                ->select('posts.*', 'categories.en_name as category_name', 'sub_category.en_name as sub_category_name');

            if ($request->get('title')) {
                $data['title'] = $request->get('title');
                $query->where('posts.tracking_number', 'like', '%' . $request->get('title') . '%');
            }

            if($request->get('status')){
                $data['status'] = $request->get('status');
                $query->where('posts.status', $request->get('status'));
            }

            if($request->get('is_popular')){
                $data['is_popular'] = $request->get('is_popular');
                $query->where('posts.is_popular', $request->get('is_popular'));
            }

            $data['posts'] = $query->orderBy('id', 'DESC')->paginate(10);

            return view('admin.post.index', $data);
        }catch (\Exception $e){
            abort(404);
        }
    }

    /**
     * Post is_popular field update here
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateIsPopular(Request $request)
    {
        try {
            $getApprovedPost = Post::whereIn('status', ['Approved'])->where('id', $request->get('post_id'))->count();

            if ($getApprovedPost) {
                self::updatePostData(postId: $request->get('post_id'), data: array('is_popular' => $request->get('is_popular')));

                return response()->json([
                    'status' => true,
                    'message' => 'Updated successfully'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'error' => 'Only approved post can be popular.'
                ]);
            }

        }catch (\Exception $exception){
            return response()->json([
                'status' => false,
                'error' => 'Something went wrong'
            ]);
        }
    }

    /**
     * The post status update here
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUpdateStatus(Request $request)
    {
        try {
            self::updatePostData(postId: $request->get('post_id'), data: array('status' => $request->get('status')));

            return response()->json([
                'status' => true,
                'message' => 'Updated successfully'
            ]);

        }catch (\Exception $exception){
            return response()->json([
                'status' => false,
                'error' => 'Something went wrong'
            ]);
        }
    }

    public function rejectStatusUpdate(Request $request)
    {
        try {
            $update = self::updatePostData(postId: $request->get('post_id'), data: array('status' => $request->get('status'), 'comment' => $request->get('comment')));
            if ($update) {
                flash('Updated successfully')->success();
                return redirect()->back();
            }
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function view(int $postId)
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

            $data['images'] = ImageUploadService::getPostImage(postId: $postId);

            $getPostDetail = CategoryWiseDetailViewService::getView(categoryId: $data['post']->category_id, subCategoryId: $data['post']->sub_category_id,postId: $postId, viewType: 'user');

            $data['postDetailHtml'] = view($getPostDetail['file_path'], $getPostDetail['data'])->render();


            return view('admin.post.view', $data);

        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Something went wrong at line number'. $exception->getLine());
        }
    }

    protected static function updatePostData(int $postId, array $data):bool|null
    {
        return Post::where('id', $postId)->update($data += ['updated_by' => Auth::guard('admin')->id()]);
    }
}
