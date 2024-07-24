<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\BuySell;

final class BuySellController extends Controller
{
    public function index()
    {
        $buySells = BuySell::where('is_active', true)->orderBy('priority', 'ASC')->get();
        $data = [];
        foreach($buySells as $buy) {
            $data[$buy->content_type_id][] = $buy;
        }

        return view('frontEnd.pages.buy-sell', compact('data'));
    }
}
