<?php

namespace App\Services\Front;

use App\Models\PropertyDetail;
use App\Models\Vehicle\VehicleDetail;

class CategoryWisePostDetailDeleteService
{
    public static function deletePostDetail(int $categoryId, int $postId): void
    {
        switch ($categoryId) {
            case CategoryNameService::PROPERTY_FOR_RENT:
            case CategoryNameService::PROPERTY_FOR_SALE:
                PropertyDetail::where(['post_id' => $postId])->delete();
                break;
            case CategoryNameService::VEHICLE_FOR_RENT:
            case CategoryNameService::VEHICLE_FOR_SALE:
                VehicleDetail::where(['post_id' => $postId])->delete();
                break;
            default:
                break;
        }
    }
}
