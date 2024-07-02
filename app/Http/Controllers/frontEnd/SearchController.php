<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\Front\CategoryNameService as CATEGORY_NAME;
use App\Services\Front\CategoryWiseSearchBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

final class SearchController extends Controller
{
    public function index(Request $request, $cat_id = null)
    {
        try {
            $data['category_id'] = ($request->get('category_id')) ? $request->get('category_id') : $cat_id;
            $data['posts'] = $this->categoryWisePost($request->all(), $data['category_id']);
            $getBarHtml = CategoryWiseSearchBar::getSearchBar(categoryId: $data['category_id']);

            if (!in_array("", $getBarHtml)) {
                $data['searchBarHtml'] = view($getBarHtml['file_path'], $getBarHtml['data'])->render();
            }

            return view('frontEnd.search.search', $data);
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getFile());
        }
    }

    public function getCategoryWiseSearch(Request $request)
    {
        try {
            $getBarHtml = CategoryWiseSearchBar::getSearchBar(categoryId: $request->get('category_id'));

            $getPostData = $this->categoryWisePost($request->all(), $request->get('category_id'));
            $postHtml = view('frontEnd.search.search-post', ['posts' => $getPostData])->render();

            if (in_array("", $getBarHtml)) {
                return response()->json([
                    'status' => true,
                    'message' => 'Search bar not found',
                    'postHtml' => $postHtml

                ]);
            } else {
                return response()->json([
                    'status' => true,
                    'barHtml' => view($getBarHtml['file_path'], $getBarHtml['data'])->render(),
                    'postHtml' => $postHtml
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function postDataFilter(Request $request)
    {
        try {
            $query = Post::query()
                ->leftJoin('states', 'states.id', '=', 'posts.state_id')
                ->leftJoin('cities', 'cities.id', '=', 'posts.city_id');

            if ($this->getCategoryNameById($request->get('category_id')) == 'property') {
                $query->leftJoin('property_details', 'posts.id', '=', 'property_details.post_id')
                ->select(
                    'posts.id',
                    'posts.price',
                    'posts.title',
                    'posts.category_id',
                    'posts.sub_category_id',
                    'posts.updated_at',
                    'property_details.number_of_room',
                    'property_details.number_of_washroom',
                    'states.name as state',
                    'cities.name as city'
                );

                if ($request->get('sub_category_id')) {
                    $query->where('posts.sub_category_id', $request->get('sub_category_id'));
                }

                if ($request->get('state_id')) {
                    $query->where('posts.state_id', $request->get('state_id'));
                }

                if ($request->get('price_range')) {
                    $query->whereBetween('posts.price', [1, $request->get('price_range')]);
                }

                if ($request->get('size_range')) {
                    $query->whereBetween('property_details.size', [1, $request->get('size_range')]);
                }

                if ($request->get('room_number')) {
                    $query->where('property_details.number_of_room', $request->get('room_number'));
                }

                if ($request->get('washroom_no')) {
                    $query->where('property_details.number_of_room', $request->get('washroom_no'));
                }

            } elseif ($this->getCategoryNameById($request->get('category_id')) == 'vehicle') {
                $query->leftJoin('vehicle_details', 'posts.id', '=', 'vehicle_details.post_id')
                    ->select(
                        'posts.id',
                        'posts.price',
                        'posts.title',
                        'posts.category_id',
                        'posts.sub_category_id',
                        'posts.updated_at',
                        'vehicle_details.model_year',
                        'vehicle_details.km',
                        'states.name as state',
                        'cities.name as city'
                    );

                if ($request->get('sub_category_id')) {
                    $query->where('posts.sub_category_id', $request->get('sub_category_id'));
                }

                if ($request->get('state_id')) {
                    $query->where('posts.state_id', $request->get('state_id'));
                }

                if ($request->get('price_range')) {
                    $query->whereBetween('posts.price', [1, $request->get('price_range')]);
                }

                if ($request->get('brand_id')) {
                    $query->where('vehicle_details.brand_id', $request->get('brand_id'));
                }

                if ($request->get('model_year')) {
                    $query->where('vehicle_details.model_year', $request->get('model_year'));
                }

                if ($request->get('km')) {
                    $query->whereBetween('vehicle_details.km', [1, $request->get('km')]);
                }

            }


            $posts = $query->whereIn('posts.status', ['approved'])
                ->where('posts.category_id', $request->get('category_id'))
                ->orderBy('posts.updated_at', 'DESC')
                ->get();

            return response()->json([
                'status' => true,
                'postHtml' => view('frontEnd.search.search-post', ['posts' => $posts])->render(),
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function categoryWisePost(?array $request, int $categoryId): object|null
    {
        $query = Post::query()
            ->leftJoin('states', 'states.id', '=', 'posts.state_id')
            ->leftJoin('cities', 'cities.id', '=', 'posts.city_id')
            ->whereIn('posts.status', ['approved'])
            ->where('category_id', $categoryId);

        if (isset($request['search'])) {
            $query->where('title', 'like', '%' . $request['search'] . '%');
        }

        if (Session::get('location')) {
            $query->where('posts.state_id', Session::get('location'));
        }

        return $query->orderBy('updated_at', 'DESC')->get([
            'posts.id',
            'posts.price',
            'posts.title',
            'posts.category_id',
            'posts.sub_category_id',
            'posts.updated_at',
            'states.name as state',
            'cities.name as city',
        ]);
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

}
