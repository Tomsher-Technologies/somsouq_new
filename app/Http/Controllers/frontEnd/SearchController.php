<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\Front\CategoryWiseSearchBar;
use Illuminate\Http\Request;
final class SearchController extends Controller
{
    public function index(Request $request, $cat_id = null)
    {
        try {
            $data['category_id'] = ($request->get('category_id')) ? $request->get('category_id') : $cat_id;

            $query = Post::query()
                ->leftJoin('states', 'states.id', '=', 'posts.state_id')
                ->leftJoin('cities', 'cities.id', '=', 'posts.city_id')
                ->whereIn('posts.status', ['approved'])
                ->where('category_id', $data['category_id']);

            if ($request->get('search')) {
                $query->where('title', 'like', '%' . $request->get('search') . '%');
            }

            $data['posts'] = $query->get([
                'posts.*',
                'states.name as state',
                'cities.name as city',
            ]);

            $getBarHtml = CategoryWiseSearchBar::getSearchBar(categoryId: $data['category_id']);

            if (!in_array("", $getBarHtml)) {
                $data['searchBarHtml'] = view($getBarHtml['file_path'], $getBarHtml['data'])->render();
            }

            return view('frontEnd.search.search', $data);
        }catch (\Exception $e){
            dd($e->getMessage(), $e->getFile());
        }
    }

    public function getCategoryWiseSearchBar(Request $request)
    {

        try {
            $getBarHtml = CategoryWiseSearchBar::getSearchBar(categoryId: $request->get('category_id'));
            if (in_array("", $getBarHtml)) {
                return response()->json([
                    'status' => true,
                    'message' => 'form not found'
                ]);
            } else {
                return response()->json([
                    'status' => true,
                    'html' => view($getBarHtml['file_path'], $getBarHtml['data'])->render()
                ]);
            }

        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

}
