<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\State;
use Artisan;
use Cache;
use Illuminate\Support\Facades\Auth;

final class HomeController extends Controller
{
    public function index()
    {
        //        $a = Post::latest("updated_at")
//            ->fromSub('select *, ROW_NUMBER() OVER (PARTITION BY category_id) as RowNumber from posts', 'x')
//            ->where('RowNumber', '<=', 1)
//            ->get();
//
//        $posts = [];
//
//        foreach ($a as $key => $value) {
//            $posts[$value->category_id][] = $value;
//        }
        $data['categories'] = Category::where('parent_id', 0)->where('is_active', 1)->pluck('en_name', 'id');

        $data['popular_ads'] = Post::leftJoin('states', 'states.id', '=', 'posts.state_id')
            ->leftJoin('cities', 'cities.id', '=', 'posts.city_id')
            ->where('posts.is_popular', 'yes')
            ->whereIn('posts.status', ['approved'])
            ->orderBy('posts.id', 'desc')
            ->limit(8)
            ->get([
                'posts.id',
                'posts.title',
                'posts.price',
                'posts.status',
                'states.name as state',
                'cities.name as city',
            ]);

        $getPost = Post::leftJoin('states', 'states.id', '=', 'posts.state_id')
            ->leftJoin('cities', 'cities.id', '=', 'posts.city_id')
            ->whereIn('posts.status', ['approved'])
            ->orderBy('posts.id', 'desc')
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
    }
}
