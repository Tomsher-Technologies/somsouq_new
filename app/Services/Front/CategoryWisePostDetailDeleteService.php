<?php

namespace App\Services\Front;

use App\Models\PropertyDetail;
use App\Models\VehicleDetail;

class CategoryWisePostDetailDeleteService
{
    public static function deletePostDetail(int $categoryId, int $postId): void
    {
        switch ($categoryId) {
            case Category::PROPERTY_FOR_RENT:
            case Category::PROPERTY_FOR_SALE:
                PropertyDetail::where(['post_id' => $postId])->delete();
                break;
            case Category::VEHICLE_FOR_RENT:
            case Category::VEHICLE_FOR_SALE:
                VehicleDetail::where(['post_id' => $postId])->delete();
                break;
            default:
                break;
        }
    }
}
