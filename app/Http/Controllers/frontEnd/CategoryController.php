<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

final class CategoryController extends Controller
{
    public function getSubCategoriesByCategory(Request $request)
    {
        try {
            $categoryId = $request->input('category_id');
            $getSubCategory = Category::where('parent_id', '=', $categoryId)->where('is_active', 1)->get([
                'id',
                'en_name',
                'ar_name',
                'so_name'
            ])->each(function ($item) {
                $item->name = $item->getTranslation('name', app()->getLocale() ?? "en") ?? $item->en_name;

            });

            //dd($getSubCategory);

            return response()->json([
                'status' => true,
                'data' => $getSubCategory
            ]);

        }catch (\Exception $exception){
            return response()->json([
                'status' => false,
                'error' => $exception->getMessage()
            ]);
        }

    }
}
