<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Tutorial;

final class TutorialController extends Controller
{
    public function index()
    {

        return view('frontEnd.pages.tutorial', [
            'tutorials' => Tutorial::where('is_active', 1)->get()
        ]);
    }
}
