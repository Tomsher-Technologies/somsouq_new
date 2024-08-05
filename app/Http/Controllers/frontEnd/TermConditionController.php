<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Condition;

final class TermConditionController extends Controller
{
    public function index()
    {
        $condition = Condition::where('id', 1)->first();
        return view('frontEnd.pages.term-condition', compact('condition'));
    }
}
