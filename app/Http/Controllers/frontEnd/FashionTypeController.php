<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Fashion\FashionType;
use App\Models\Fashion\Variant;
use App\Models\Fashion\VariantValue;
use Illuminate\Http\Request;

final class FashionTypeController extends Controller
{
    public function getFashionTypeWiseSize(Request $request)
    {
        try {
            $typeId = $request->input('type_id');
            $variant_id = FashionType::where('id', $typeId)->where('is_active', 1)->value('variant_type_id');

            $variants = Variant::join('variant_value', 'variant_value.variant_id', '=', 'variants.id')
                ->where('variants.id', $variant_id)
                ->where('variants.is_active', 1)
                ->orderBy('variant_value.priority')
                ->get([
                    'variant_value.*'
                ]);

            return response()->json([
                'status' => true,
                'data' => $variants
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ]);
        }
    }


}
