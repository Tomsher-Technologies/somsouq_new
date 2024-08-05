<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Copyright;
use App\Models\Policy;

final class PolicyController extends Controller
{
    public function index()
    {
        $policy = Policy::find(1);
        return view('frontEnd.pages.policy', compact('policy'));
    }

    public function copyright()
    {
        try {
            $copyright = Copyright::find(1);
            return view('frontEnd.pages.copyright_policy', compact('copyright'));
        }catch (\Exception $e) {
           abort('404');
        }
    }
}
