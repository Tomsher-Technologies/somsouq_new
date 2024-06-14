<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Artisan;
use Cache;

final class HomeController extends Controller
{
    public function index()
    {
        return view('frontEnd.home.home');
    }
}
