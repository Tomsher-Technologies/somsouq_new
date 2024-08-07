<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Libraries\CommonFunction;
use App\Models\Electronic\ElectronicType;
use App\Models\Fashion\FashionType;
use App\Models\Fashion\Material;
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

            $data['category_name'] = CommonFunction::getCategoryName(category_id: $data['category_id'])->getTranslation('name', getLocaleLang());

            $data['posts'] = $this->categoryWisePost($request->all(), $data['category_id']);
            $getBarHtml = CategoryWiseSearchBar::getSearchBar(categoryId: $data['category_id']);

            if (!in_array("", $getBarHtml)) {
                $data['searchBarHtml'] = view($getBarHtml['file_path'], $getBarHtml['data'])->render();
            }

            $data['category_wise_total_post'] = $this->categoryWiseTotalPost($data['category_id']);

            return view('frontEnd.search.search', $data);
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getFile());
        }
    }

    public function getCategoryWiseSearch(Request $request)
    {
        try {
            $getBarHtml = CategoryWiseSearchBar::getSearchBar(categoryId: $request->get('category_id'));

            $data['posts'] = $this->categoryWisePost($request->all(), $request->get('category_id'));

            $data['category_id'] = $request->get('category_id');
            $data['category_wise_total_post'] = $this->categoryWiseTotalPost($request->get('category_id'));
            $data['category_name'] = CommonFunction::getCategoryName(category_id: $data['category_id'])->getTranslation('name', getLocaleLang());
            $postHtml = view('frontEnd.search.search-post', $data)->render();

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

            if (in_array($request->get('category_id'), [CATEGORY_NAME::PROPERTY_FOR_RENT, CATEGORY_NAME::PROPERTY_FOR_SALE])) {
                $query->leftJoin('property_details', 'posts.id', '=', 'property_details.post_id')
                ->select(
                    'posts.id',
                    'posts.price',
                    'posts.title',
                    'posts.category_id',
                    'posts.sub_category_id',
                    'posts.updated_at',
                    'posts.created_by',
                    'property_details.number_of_room',
                    'property_details.number_of_washroom',
                    'states.name as state',
                    'cities.name as city'
                );

            } elseif (in_array($request->get('category_id'), [CATEGORY_NAME::VEHICLE_FOR_RENT, CATEGORY_NAME::VEHICLE_FOR_SALE])) {
                $query->leftJoin('vehicle_details', 'posts.id', '=', 'vehicle_details.post_id')
                    ->select(
                        'posts.id',
                        'posts.price',
                        'posts.title',
                        'posts.category_id',
                        'posts.sub_category_id',
                        'posts.updated_at',
                        'posts.created_by',
                        'vehicle_details.model_year',
                        'vehicle_details.km',
                        'states.name as state',
                        'cities.name as city'
                    );

            } elseif ($request->get('category_id') == CATEGORY_NAME::FASHION) {
                $query->leftJoin('fashion_details', 'posts.id', '=', 'fashion_details.post_id')
                    ->select(
                        'posts.id',
                        'posts.price',
                        'posts.title',
                        'posts.category_id',
                        'posts.sub_category_id',
                        'posts.updated_at',
                        'posts.created_by',
                        'fashion_details.color_id',
                        'fashion_details.type_id',
                        'fashion_details.material_id',
                        'states.name as state',
                        'cities.name as city'
                    );
            } elseif ($request->get('category_id') == CATEGORY_NAME::ELECTRONIC) {
                $query->leftJoin('electronic_details', 'posts.id', '=', 'electronic_details.post_id')
                    ->select(
                        'posts.id',
                        'posts.price',
                        'posts.title',
                        'posts.category_id',
                        'posts.sub_category_id',
                        'posts.updated_at',
                        'posts.created_by',
                        'electronic_details.color_id',
                        'electronic_details.type_id',
                        'states.name as state',
                        'cities.name as city'
                    );
            }

            if ($request->get('sub_category_id')) {
                $query->where('posts.sub_category_id', $request->get('sub_category_id'));
            }

            if ($request->get('state_id')) {
                $query->where('posts.state_id', $request->get('state_id'));
            }

            if ($request->get('price_range')) {
                $query->whereBetween('posts.price', [1, $request->get('price_range')]);
            }

            if (in_array($request->get('category_id'), [CATEGORY_NAME::PROPERTY_FOR_RENT, CATEGORY_NAME::PROPERTY_FOR_SALE])) {
                if ($request->get('size_range')) {
                    $query->whereBetween('property_details.size', [1, $request->get('size_range')]);
                }

                if ($request->get('room_number')) {
                    $query->where('property_details.number_of_room', $request->get('room_number'));
                }

                if ($request->get('washroom_no')) {
                    $query->where('property_details.number_of_room', $request->get('washroom_no'));
                }
            } elseif (in_array($request->get('category_id'), [CATEGORY_NAME::VEHICLE_FOR_RENT, CATEGORY_NAME::VEHICLE_FOR_SALE])) {
                if ($request->get('brand_id')) {
                    $query->where('vehicle_details.brand_id', $request->get('brand_id'));
                }

                if ($request->get('model_year')) {
                    $query->where('vehicle_details.model_year', $request->get('model_year'));
                }

                if ($request->get('km')) {
                    $query->whereBetween('vehicle_details.km', [1, $request->get('km')]);
                }
            } elseif ($request->get('category_id') == CATEGORY_NAME::FASHION) { // 5 = fashion
                if ($request->get('color_id')) {
                    $query->where('fashion_details.color_id', $request->get('color_id'));
                }
                if ($request->get('type_id')) {
                    $query->where('fashion_details.type_id', $request->get('type_id'));
                }

                if ($request->get('material_id')) {
                    $query->where('fashion_details.material_id',$request->get('material_id'));
                }
            } elseif ($request->get('category_id') == CATEGORY_NAME::ELECTRONIC) {
                if ($request->get('sub_category_id') == 52) {
                    if ($request->get('genre_id')) {
                        $query->where('electronic_details.genre_id', $request->get('genre_id'));
                    }

                    if ($request->get('platform_id')) {
                        $query->where('electronic_details.platform_id', $request->get('platform_id'));
                    }
                } else {
                    if ($request->get('brand_id')) {
                        $query->where('electronic_details.brand_id', $request->get('brand_id'));
                    }

                    if ($request->get('type_id')) {
                        $query->where('electronic_details.type_id', $request->get('type_id'));
                    }
                }

                if ($request->get('condition')) {
                    $query->where('electronic_details.condition', $request->get('condition'));
                }
            }


            $query->whereIn('posts.status', ['approved'])
                ->where('posts.category_id', $request->get('category_id'));

            if ($request->get('sorting_value')) {
                if ($request->get('sorting_value') == 1) { // newest
                    $query->orderBy('posts.updated_at', 'DESC');
                } elseif ($request->get('sorting_value') == 2) { // low to height
                    $query->orderBy('posts.price', 'ASC');
                } elseif ($request->get('sorting_value') == 3) { // height to low
                    $query->orderBy('posts.price', 'DESC');
                }
            }

            $data['posts'] = $query->get();

            $data['category_id'] = $request->get('category_id');
            $data['category_wise_total_post'] = $query->get()->count();
            $data['category_name'] = CommonFunction::getCategoryName(category_id: $data['category_id'])->getTranslation('name', getLocaleLang());
            return response()->json([
                'status' => true,
                'postHtml' => view('frontEnd.search.search-post', $data)->render(),
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

        if (isset($request['popular_post'])) {
            $query->where('is_popular', 'yes');
        }

        if (Session::get('location')) {
            $query->where('posts.state_id', Session::get('location'));
        }

        return $query->get([
            'posts.id',
            'posts.price',
            'posts.title',
            'posts.category_id',
            'posts.sub_category_id',
            'posts.updated_at',
            'posts.created_by',
            'states.name as state',
            'cities.name as city',
        ]);
    }

    public function categoryWiseTotalPost(int $categoryId): int|null
    {
        $query = Post::query()->where('category_id', $categoryId)->whereIn('posts.status', ['approved']);
        if (Session::get('location')) {
            $query->where('posts.state_id', Session::get('location'));
        }

        return $query->count();
    }

    public function getTypeMaterialList(Request $request)
    {
        try {
            $types = FashionType::where('sub_category_id', $request->get('sub_category_id'))->where('is_active', 1)->get(['id', 'name']);
            $materials = Material::where('sub_category_id', $request->get('sub_category_id'))->where('is_active', 1)->get(['id', 'name']);

            return response()->json([
                'status' => true,
                'type' => $types,
                'material' => $materials
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status' => false
            ]);
        }
    }

    public function getElectronicTypeList(Request $request)
    {
        try {
            $types = ElectronicType::where('sub_category_id', $request->get('sub_category_id'))->where('is_active', 1)->get(['id', 'name']);

            return response()->json([
                'status' => true,
                'type' => $types,
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status' => false
            ]);
        }
    }

}
