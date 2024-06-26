<?php

namespace App\Services\Front;

use App\Models\PropertyDetail;
use App\Models\VehicleDetail;

class CategoryWisePostDetailDataService
{
    protected static array $postDetailDate = [];
    public static function getData(int $categoryId, int $postId): object|null
    {
        switch ($categoryId) {
            case CategoryNameService::PROPERTY_FOR_RENT:
            case CategoryNameService::PROPERTY_FOR_SALE:
                static::$postDetailDate['data'] = PropertyDetail::where('post_id', $postId)->first();
                break;
            case CategoryNameService::VEHICLE_FOR_RENT:
            case CategoryNameService::VEHICLE_FOR_SALE:
                static::$postDetailDate['data'] = VehicleDetail::where('post_id', $postId)->first();
                break;
            default:
                break;
        }

       return static::$postDetailDate['data'];
    }
}
