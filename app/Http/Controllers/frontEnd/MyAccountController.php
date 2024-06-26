<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Artisan;
use Cache;
use Illuminate\Support\Facades\Auth;

final class MyAccountController extends Controller
{
    public function index()
    {
        $data['posts'] = Post::leftJoin('states', 'states.id', '=', 'posts.state_id')
            ->leftJoin('cities', 'cities.id', '=', 'posts.city_id')
            ->where('posts.created_by', Auth::id())->whereIn('posts.status', ['pending', 'approved'])
            ->where('posts.tracking_number', '!=', null)
            ->orderBy('posts.id', 'desc')
            ->get([
                'posts.id',
                'posts.title',
                'posts.description',
                'posts.status',
                'states.name as state',
                'cities.name as city',
            ]);

        $data['total_pending'] = Post::where('created_by', Auth::id())->whereIn('status', ['pending'])->count();

        return view('frontEnd.account.index', $data);
    }
}
