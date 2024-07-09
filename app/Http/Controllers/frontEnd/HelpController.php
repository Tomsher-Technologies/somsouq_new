<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;

final class HelpController extends Controller
{
    public function index()
    {
        return view('frontEnd.pages.help');
    }
}
