<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\About;

final class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::with(["AboutDescription" => function ($query) {
            $query->where('is_active', true);
        }])->where('is_active', true)->get();

        return view('frontEnd.pages.about-us', compact('abouts'));
    }
}
