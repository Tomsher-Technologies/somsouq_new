<?php

namespace App\Services\Front;

use App\Models\PropertyDetail;
use App\Models\VehicleDetail;
use Illuminate\Support\Facades\App;

class CategoryWisePostDetailStoreService
{
    public static function storePostDetails(array $request, int $postId): void
    {
        switch ($request['category_id']) {
            case CategoryNameService::PROPERTY_FOR_RENT:
            case CategoryNameService::PROPERTY_FOR_SALE:
                $propertyDetails = PropertyDetail::findOrNew($request['post_detail_id'] ?? "");
                $propertyDetails->post_id = $postId;

                $propertyDetails->size = $request[self::setInputName('size')] ?? null;
                $propertyDetails->age_of_building = $request[self::setInputName('age_of_building')] ?? null;
                $propertyDetails->number_of_room = $request[self::setInputName('number_of_room')] ?? null;
                $propertyDetails->number_of_washroom = $request[self::setInputName('number_of_washroom')] ?? null;
                $propertyDetails->number_of_floor = $request[self::setInputName('number_of_floor')] ?? null;
                $propertyDetails->floor_number = $request[self::setInputName('floor_number')] ?? null;
                $propertyDetails->furniture_status = $request[self::setInputName('furniture_status')] ?? null;
                $propertyDetails->elevator = $request[self::setInputName('elevator')] ?? null;
                $propertyDetails->usage_status	 = $request[self::setInputName('usage_status')] ?? null;
                $propertyDetails->condition_status	 = $request[self::setInputName('condition_status')] ?? null;
                $propertyDetails->save();

                break;
            case CategoryNameService::VEHICLE_FOR_RENT:
            case CategoryNameService::VEHICLE_FOR_SALE:
               $vehicleDetails = VehicleDetail::findOrNew($request['post_detail_id'] ?? "");
               $vehicleDetails->post_id = $postId;
               $vehicleDetails->brand_id = $request[self::setInputName('brand_id')] ?? null;

               $vehicleDetails->model_year = $request[self::setInputName('model_year')] ?? null;
               $vehicleDetails->model_number = $request[self::setInputName('model_number')] ?? null;
               $vehicleDetails->km = $request[self::setInputName('km')] ?? null;
               $vehicleDetails->color_id = $request[self::setInputName('color_id')] ?? null;
               $vehicleDetails->fuel_type = $request[self::setInputName('fuel_type')] ?? null;
               $vehicleDetails->transmission = $request[self::setInputName('transmission')] ?? null;
               $vehicleDetails->body_type_id = $request[self::setInputName('body_type_id')] ?? null;
               $vehicleDetails->driver_side = $request[self::setInputName('driver_side')] ?? null;
               $vehicleDetails->seat = $request[self::setInputName('seat')] ?? null;
               $vehicleDetails->engine_capacity = $request[self::setInputName('engine_capacity')] ?? null;
               $vehicleDetails->engine_power = $request[self::setInputName('engine_power')] ?? null;
               $vehicleDetails->cylinder = $request[self::setInputName('cylinder')] ?? null;
               $vehicleDetails->carriage_capacity = $request[self::setInputName('carriage_capacity')] ?? null;
               $vehicleDetails->number_of_tire = $request[self::setInputName('number_of_tire')] ?? null;
               $vehicleDetails->exchangeable = $request[self::setInputName('exchangeable')] ?? null;
               $vehicleDetails->usage_condition = $request[self::setInputName('usage_condition')] ?? null;
               $vehicleDetails->auto_part_type_id = $request[self::setInputName('auto_part_type_id')] ?? null;
               $vehicleDetails->heavy_equipment_type_id = $request[self::setInputName('heavy_equipment_type_id')] ?? null;
               $vehicleDetails->boat_type_id = $request[self::setInputName('boat_type_id')] ?? null;
               $vehicleDetails->price_per_month = $request[self::setInputName('price_per_month')] ?? null;
               $vehicleDetails->save();
                break;
            default:
                break;
        }
    }

    public static function setInputName($name)
    {
        return $name .'_'. getLocaleLang();
    }



}
