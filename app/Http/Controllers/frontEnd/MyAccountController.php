<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Artisan;
use Cache;

final class MyAccountController extends Controller
{
    public function index()
    {
        return view('frontEnd.account.index');
    }
}
