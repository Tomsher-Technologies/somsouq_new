<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\State;
use Artisan;
use Cache;

final class HomeController extends Controller
{
    public function index()
    {
        $data['states'] = State::where('status', 1)->pluck('name', 'id');
        $data['categories'] = Category::where('parent_id', 0)->where('is_active', 1)->pluck('en_name', 'id');



        return view('frontEnd.home.home', $data);
    }
}
