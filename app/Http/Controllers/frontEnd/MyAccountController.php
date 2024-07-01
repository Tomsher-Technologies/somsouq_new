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
        try {
            $data['posts'] = Post::leftJoin('states', 'states.id', '=', 'posts.state_id')
                ->leftJoin('cities', 'cities.id', '=', 'posts.city_id')
                ->where('posts.created_by', Auth::id())->whereIn('posts.status', ['pending', 'approved', 'sold', 'rejected'])
                ->orderBy('posts.updated_at', 'desc')
                ->get([
                    'posts.id',
                    'posts.title',
                    'posts.description',
                    'posts.status',
                    'states.name as state',
                    'cities.name as city',
                ]);

            $data['total_pending'] = Post::where('created_by', Auth::id())->whereIn('status', ['pending'])->count();
            $data['total_approve'] = Post::where('created_by', Auth::id())->whereIn('status', ['approved'])->count();
            $data['total_sold'] = Post::where('created_by', Auth::id())->whereIn('status', ['sold'])->count();
            $data['total_rejected'] = Post::where('created_by', Auth::id())->whereIn('status', ['rejected'])->count();

            return view('frontEnd.account.index', $data);
        }catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
