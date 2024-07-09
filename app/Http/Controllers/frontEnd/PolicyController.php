<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;

final class PolicyController extends Controller
{
    public function index()
    {
        return view('frontEnd.pages.policy');
    }
}
