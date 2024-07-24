<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Artisan;
use Cache;

class AdminController extends Controller
{
    public function dashboard(){
        $data['total_user'] = User::where('status', 1)->count();
        $data['total_approved_ads'] = Post::where('status', 'approved')->count();
        $data['total_pending_ads'] = Post::where('status', 'pending')->count();
        $data['total_sold_ads'] = Post::where('status', 'sold')->count();
        return view('admin.dashboard', $data);
    }

    function clearCache(Request $request)
    {
        Artisan::call('cache:clear');
        flash(translate('Cache cleared successfully'))->success();
        return back();
    }
}
