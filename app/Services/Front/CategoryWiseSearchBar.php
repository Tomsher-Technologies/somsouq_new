<?php

namespace App\Services\Front;

use App\Models\Category;
use App\Models\Post;
use App\Models\State;

class CategoryWiseSearchBar {
    protected static string|null $htmlFormName = null;
    protected static array $htmlFormData = [];

    const VIEW_PATH = "file_path";
    const DATA = 'data';
    public static function getSearchBar(int $categoryId)
    {
        switch ($categoryId) {
            case CategoryNameService::PROPERTY_FOR_RENT:
            case CategoryNameService::PROPERTY_FOR_SALE:
                static::$htmlFormData['subCategories'] = Category::where('parent_id', '=', $categoryId)->where('is_active', 1)->get([
                    'id',
                    'en_name'
                ]);

                static::$htmlFormData['states'] = State::where('status', 1)->pluck('name', 'id');
                static::$htmlFormData['price_ranges'] = self::generatePriceRange(categoryId: $categoryId);
                static::$htmlFormData['size_range'] = self::generateSizeRange(categoryId: $categoryId);

                static::$htmlFormName = "frontEnd.search.bar.property_bar";
                break;
            case CategoryNameService::VEHICLE_FOR_RENT:
            case CategoryNameService::VEHICLE_FOR_SALE:

                static::$htmlFormName = "frontEnd.search.bar.vehicle_bar";
                break;
            default:
                break;
        }

        return [
            static::VIEW_PATH => static::$htmlFormName,
            static::DATA => static::$htmlFormData,
        ];
    }

    public static function generatePriceRange(int $categoryId): array|null
    {
        $getPrice = Post::selectRaw('MAX(price) AS max_price, MIN(price) AS min_price')
            ->where('category_id', $categoryId)
            ->first();

        $data = [];

        if (empty($getPrice)) {
            if ($getPrice->max_price === $getPrice->min_price) {
                $data[0] = (float) $getPrice->max_price;
            } else {
                $data = range($getPrice->min_price, $getPrice->max_price, $getPrice->max_price/10);
                $data[10] = (float) $getPrice->max_price;
            }
        }

        return $data;
    }

    public static function generateSizeRange(int $categoryId): array|null
    {
        $getSize = Post::leftJoin('property_details as pd', 'pd.post_id', '=', 'posts.id')
            ->selectRaw('MAX(pd.size) AS max_size, MIN(pd.size) AS min_size')
            ->where('posts.category_id', $categoryId)
            ->get();

        $data = [];
        if (empty($getSize)) {
            dd(11);
            if ($getSize[0]->max_size === $getSize[0]->min_size) {
                $data[0] = (float) $getSize->max_size;
            } else {
                $data = range($getSize[0]->min_size, $getSize[0]->max_size, $getSize[0]->max_size/10);
                $data[10] = (float) $getSize[0]->max_size;
            }
        }

        return $data;
    }
}
