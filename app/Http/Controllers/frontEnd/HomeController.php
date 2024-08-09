<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\LastViewPost;
use App\Models\Post;
use Artisan;
use Cache;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

final class HomeController extends Controller
{
    public function index()
    {
        try {
            $data['popular_ads'] = [];
            if (webUser()) {
                $viewed_category= LastViewPost::where('user_id', webUser()->id ?? "")->orderBy('updated_at', 'desc')->limit(4)->get(['category_id'])->toArray();

                $query = Post::query();
                $query->leftJoin('states', 'states.id', '=', 'posts.state_id')
                    ->leftJoin('cities', 'cities.id', '=', 'posts.city_id')
                    ->whereIn('posts.category_id', $viewed_category)
                    ->whereIn('posts.status', ['approved'])
//                    ->inRandomOrder()
                    ->groupLimit(2, 'category_id');

                if (Session::get('location')) {
                    $query->where('posts.state_id', Session::get('location'));
                }

                $data['popular_ads'] = $query->orderBy('posts.updated_at', 'desc')
                    ->get([
                        'posts.id',
                        'posts.title',
                        'posts.price',
                        'posts.status',
                        'posts.category_id',
                        'states.name as state',
                        'cities.name as city',
                    ]);
            }

//            $query->latest("p.updated_at")
//                ->fromSub('select *, ROW_NUMBER() OVER (PARTITION BY category_id) as RowNumber from posts', 'p')
//                ->leftJoin('states', 'states.id', '=', 'p.state_id')
//                ->leftJoin('cities', 'cities.id', '=', 'p.city_id')
//                ->where('RowNumber', '<=', 8);

            $query = Post::query();
            $query->leftJoin('states', 'states.id', '=', 'posts.state_id')
                ->leftJoin('cities', 'cities.id', '=', 'posts.city_id')
                ->whereIn('posts.status', ['approved'])
//                ->inRandomOrder()
                ->groupLimit(8, 'category_id');

            if (Session::get('location')) {
                $query->where('posts.state_id', Session::get('location'));
            }

            $getPost = $query->orderBy('posts.updated_at', 'desc')
                ->get([
                    'posts.id',
                    'posts.category_id',
                    'posts.title',
                    'posts.price',
                    'posts.status',
                    'states.name as state',
                    'cities.name as city',
                ]);

            $posts = [];

            foreach ($getPost as $key => $value) {
                $posts[$value->category_id][] = $value;
            }
            $data['posts'] = $posts;

            return view('frontEnd.home.home', $data);
        } catch (\Exception $e) {
            abort(404);
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
        \LaravelLocalization::setLocale($language);
        Session::put("locale", $language);

        $url = \LaravelLocalization::getLocalizedURL(getLocaleLang(), \URL::previous());
        return Redirect::to($url);
    }
}
