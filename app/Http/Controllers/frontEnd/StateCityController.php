<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

final class StateCityController extends Controller
{
    public function getCityByStateId(Request $request)
    {
        try {
            $stateId = $request->input('state_id');
            $getCities = City::where('state_id', $stateId)->where('status', 1)->pluck('name', 'id');

            return response()->json([
                'status' => true,
                'data' => $getCities,
            ]);

        }catch (\Exception $exception){
            return response()->json([
                'status' => false,
                'error' => $exception->getMessage()
            ]);
        }
    }
}
