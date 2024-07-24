<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Help;

final class HelpController extends Controller
{
    public function index()
    {
        return view('frontEnd.pages.help', [
            'helps' => Help::where('is_active', 1)->get()
        ]);
    }
}
