<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;

final class TutorialController extends Controller
{
    public function index()
    {
        return view('frontEnd.pages.tutorial');
    }
}
