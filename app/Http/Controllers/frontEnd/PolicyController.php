<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Policy;

final class PolicyController extends Controller
{
    public function index()
    {
        $policies = Policy::where('is_active', true)->orderBy('priority', 'ASC')->get();
        return view('frontEnd.pages.policy', compact('policies'));
    }
}
