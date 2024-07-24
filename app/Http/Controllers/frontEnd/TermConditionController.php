<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Condition;

final class TermConditionController extends Controller
{
    public function index()
    {
        $conditions = Condition::where('is_active', true)->orderby('priority', 'ASC')->get();
        return view('frontEnd.pages.term-condition', compact('conditions'));
    }
}
