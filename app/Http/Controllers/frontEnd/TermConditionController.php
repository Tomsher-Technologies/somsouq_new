<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;

final class TermConditionController extends Controller
{
    public function index()
    {
        return view('frontEnd.pages.term-condition');
    }
}
