<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Libraries\CommonFunction;
use App\Models\Category;
use App\Models\Post;
use App\Models\State;
use Artisan;
use Cache;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

final class HomeController extends Controller
{
    public function index()
    {
        try {
            //$data['categories'] = Category::where('parent_id', 0)->where('is_active', 1)->pluck('en_name', 'id');

             $query = Post::query();
                $query->leftJoin('states', 'states.id', '=', 'posts.state_id')
                    ->leftJoin('cities', 'cities.id', '=', 'posts.city_id')
                    ->leftJoin('categories', 'categories.id', '=', 'posts.category_id')
                    ->where('posts.is_popular', 'yes')
                    ->where('categories.parent_id', 0)
                    ->whereIn('posts.status', ['approved']);

            if (Session::get('location')) {
                $query->where('posts.state_id', Session::get('location'));
            }

            $data['popular_ads'] = $query->orderBy('posts.updated_at', 'desc')
                ->limit(8)
                ->get([
                    'posts.id',
                    'posts.title',
                    'posts.price',
                    'posts.status',
                    'states.name as state',
                    'cities.name as city',
                    'categories.id as category_id',
                ]);

//        $getPost = Post::leftJoin('states', 'states.id', '=', 'posts.state_id')
//            ->leftJoin('cities', 'cities.id', '=', 'posts.city_id')
//            ->whereIn('posts.status', ['approved'])
//            ->orderBy('posts.updated_at', 'desc')
//            ->get([
//                'posts.id',
//                'posts.category_id',
//                'posts.title',
//                'posts.price',
//                'posts.status',
//                'states.name as state',
//                'cities.name as city',
//            ]);

            $query = Post::query();
                $query->latest("p.updated_at")
                    ->fromSub('select *, ROW_NUMBER() OVER (PARTITION BY category_id) as RowNumber from posts', 'p')
                    ->leftJoin('states', 'states.id', '=', 'p.state_id')
                    ->leftJoin('cities', 'cities.id', '=', 'p.city_id')
                    ->where('RowNumber', '<=', 8);

                    if (Session::get('location')) {
                        $query->where('p.state_id', Session::get('location'));
                    }

            $getPost = $query->whereIn('p.status', ['approved'])
                ->orderBy('p.updated_at', 'desc')
                ->get([
                    'p.id',
                    'p.category_id',
                    'p.title',
                    'p.price',
                    'p.status',
                    'states.name as state',
                    'cities.name as city',
                ]);

            $posts = [];

            foreach ($getPost as $key => $value) {
                $posts[$value->category_id][] = $value;
            }
            $data['posts'] = $posts;

            return view('frontEnd.home.home', $data);
        }catch (\Exception $e){
            dd($e->getMessage());
        }
    }

    public function setLocation($location)
    {

        if ($location == 0) {
            Session::forget('location');
        } else {
            Session::put('location', $location);
        }

        return redirect()->back();
    }

    public function setLanguage(string $language)
    {
        App::setLocale($language);
        LaravelLocalization::setLocale($language);
        Session::put("locale", $language);

        $url = \LaravelLocalization::getLocalizedURL(getLocaleLang(), \URL::previous());
        return Redirect::to($url);
    }
}
