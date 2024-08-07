<?php

namespace App\Services\Front;

use App\Enums\Front\ElectronicCondition;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Electronic\Genre;
use App\Models\Electronic\Platform;
use App\Models\Post;
use App\Models\State;
use App\Models\Vehicle\VehicleDetail;

class CategoryWiseSearchBar {
    protected static string|null $htmlFormName = null;
    protected static array $htmlFormData = [];

    const VIEW_PATH = "file_path";
    const DATA = 'data';
    public static function getSearchBar(int $categoryId)
    {
        static::$htmlFormData['category_id'] = $categoryId;
        static::$htmlFormData['subCategories'] = Category::where('parent_id', '=', $categoryId)->where('is_active', 1)->get([
            'id',
            'en_name',
            'ar_name',
            'so_name'
        ]);

        static::$htmlFormData['price_ranges'] = self::generatePriceRange(categoryId: $categoryId);
        static::$htmlFormData['states'] = State::where('status', 1)->get(['name', 'id']);

        switch ($categoryId) {
            case CategoryNameService::PROPERTY_FOR_RENT:
            case CategoryNameService::PROPERTY_FOR_SALE:
                static::$htmlFormData['size_range'] = self::generateSizeRange(categoryId: $categoryId);

                static::$htmlFormName = "frontEnd.search.bar.property_bar";
                break;
            case CategoryNameService::VEHICLE_FOR_RENT:
            case CategoryNameService::VEHICLE_FOR_SALE:

                static::$htmlFormData['brands'] = Brand::whereIn('category_id', [CategoryNameService::VEHICLE_FOR_RENT, CategoryNameService::VEHICLE_FOR_SALE])
                    ->where('is_active', true)->get(['name', 'id']);
                static::$htmlFormData['years'] = VehicleDetail::whereNotNull('model_year')->distinct()->orderBy('model_year', 'DESC')->pluck('model_year');
                static::$htmlFormData['km'] = VehicleDetail::whereNotNull('km')->distinct()->orderBy('km', 'ASC')->pluck('km');

                static::$htmlFormName = "frontEnd.search.bar.vehicle_bar";
                break;
            case CategoryNameService::FASHION:
                static::$htmlFormData['colors'] = Color::where('is_active', 1)->get(['name', 'id']);
                static::$htmlFormData['types'] = [];
                static::$htmlFormData['materials'] = [];


                static::$htmlFormName = "frontEnd.search.bar.fashion_bar";
                break;
            case CategoryNameService::ELECTRONIC:
                static::$htmlFormData['conditions'] = ElectronicCondition::getElectronicCondition();
                static::$htmlFormData['brands'] = Brand::whereIn('category_id', [CategoryNameService::ELECTRONIC])->where('is_active', true)->get(['name', 'id']);

                static::$htmlFormData['genres'] = Genre::where('is_active', true)->get(['name', 'id']);
                static::$htmlFormData['platforms'] = Platform::where('is_active', true)->get(['name', 'id']);


                static::$htmlFormName = "frontEnd.search.bar.electronic_bar";
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

        if (!empty($getPrice)) {
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
        if (!empty($getSize)) {
            if ($getSize[0]->max_size === $getSize[0]->min_size) {
                $data[0] = (float) $getSize[0]->max_size;
            } else {
                $data = range($getSize[0]->min_size, $getSize[0]->max_size, $getSize[0]->max_size/10);
                $data[10] = (float) $getSize[0]->max_size;
            }
        }
        return $data;
    }
}
