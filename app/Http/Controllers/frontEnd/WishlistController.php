<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Wishlist;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class WishlistController extends Controller
{
    public function index()
    {
        $posts = Post::join('wishlists', 'wishlists.post_id', 'posts.id')
            ->leftJoin('categories', 'categories.id', '=', 'posts.category_id')
            ->leftJoin('states', 'states.id', '=', 'posts.state_id')
            ->leftJoin('cities', 'cities.id', '=', 'posts.city_id')
            ->where('posts.status', 'approved')
            ->where('wishlists.user_id', Auth::guard('web')->id())
            ->orderBy('wishlists.id', 'DESC')
            ->get([
                'posts.id',
                'posts.category_id',
                'posts.title',
                'posts.price',
                'posts.status',
                'wishlists.id as list_id',
                'states.name as state',
                'cities.name as city'
            ]);

        return view('frontEnd.wishlist.index', compact('posts'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addPostToWishlist(Request $request)
    {
        try {
            $getList = Wishlist::where('user_id', Auth::guard('web')->id())->where('post_id', $request->get('post_id'))->count();
            if ($getList > 0) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Already added to the wishlist',
                    'http_status' => Response::HTTP_OK,
                ]);
            }

            $wishlist = new Wishlist();
            $wishlist->user_id = Auth::guard('web')->id();
            $wishlist->post_id = $request->get('post_id');
            $wishlist->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Added to wishlist successfully',
                'http_status' => Response::HTTP_CREATED,
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong' . $e->getMessage(),
                'http_status' => Response::HTTP_INTERNAL_SERVER_ERROR,
            ]);
        }
    }

    public function deleteFromWishlist(Request $request)
    {
        try {
            $getData = Wishlist::find($request->get('list_id'));

            if (empty($getData)) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data not found',
                    'http_status' => Response::HTTP_NOT_FOUND,
                ]);
            }

            $getData->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Successfully deleted from wishlist',
                'http_status' => Response::HTTP_OK,
            ]);

        }catch (\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong' . $e->getMessage(),
                'http_status' => Response::HTTP_INTERNAL_SERVER_ERROR,
            ]);
        }


    }
}
