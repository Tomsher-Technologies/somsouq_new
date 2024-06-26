<?php

namespace App\Services\Front;

use App\Models\PropertyDetail;
use App\Models\VehicleDetail;

class CategoryWisePostDetailStoreService
{
    public static function storePostDetails(array $request, int $postId): void
    {
        switch ($request['category_id']) {
            case CategoryNameService::PROPERTY_FOR_RENT:
            case CategoryNameService::PROPERTY_FOR_SALE:
                $propertyDetails = PropertyDetail::findOrNew($request['post_detail_id'] ?? "");
                $propertyDetails->post_id = $postId;
                $propertyDetails->size = $request['size'] ?? null;
                $propertyDetails->age_of_building = $request['age_of_building'] ?? null;
                $propertyDetails->number_of_room = $request['number_of_room'] ?? null;
                $propertyDetails->number_of_washroom = $request['number_of_washroom'] ?? null;
                $propertyDetails->number_of_floor = $request['number_of_floor'] ?? null;
                $propertyDetails->floor_number = $request['floor_number'] ?? null;
                $propertyDetails->furniture_status = $request['furniture_status'] ?? null;
                $propertyDetails->elevator = $request['elevator'] ?? null;
                $propertyDetails->usage_status	 = $request['usage_status'] ?? null;
                $propertyDetails->condition_status	 = $request['condition_status'] ?? null;
                $propertyDetails->save();

                break;
            case CategoryNameService::VEHICLE_FOR_RENT:
            case CategoryNameService::VEHICLE_FOR_SALE:
               $vehicleDetails = VehicleDetail::findOrNew($request['post_detail_id'] ?? "");
               $vehicleDetails->post_id = $postId;
               $vehicleDetails->brand_id = $request['brand_id'] ?? null;
               $vehicleDetails->model_year = $request['model_year'] ?? null;
               $vehicleDetails->model_number = $request['model_number'] ?? null;
               $vehicleDetails->km = $request['km'] ?? null;
               $vehicleDetails->color_id = $request['color_id'] ?? null;
               $vehicleDetails->fuel_type = $request['fuel_type'] ?? null;
               $vehicleDetails->transmission = $request['transmission'] ?? null;
               $vehicleDetails->body_type_id = $request['body_type_id'] ?? null;
               $vehicleDetails->driver_side = $request['driver_side'] ?? null;
               $vehicleDetails->seat = $request['seat'] ?? null;
               $vehicleDetails->engine_capacity = $request['engine_capacity'] ?? null;
               $vehicleDetails->engine_power = $request['engine_power'] ?? null;
               $vehicleDetails->cylinder = $request['cylinder'] ?? null;
               $vehicleDetails->carriage_capacity = $request['carriage_capacity'] ?? null;
               $vehicleDetails->number_of_tire = $request['number_of_tire'] ?? null;
               $vehicleDetails->exchangeable = $request['exchangeable'] ?? null;
               $vehicleDetails->usage_condition = $request['usage_condition'] ?? null;
               $vehicleDetails->auto_part_type_id = $request['auto_part_type_id'] ?? null;
               $vehicleDetails->heavy_equipment_type_id = $request['heavy_equipment_type_id'] ?? null;
               $vehicleDetails->boat_type_id = $request['boat_type_id'] ?? null;
               $vehicleDetails->save();
                break;
            default:
                break;
        }
    }
}
