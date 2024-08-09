<?php

namespace App\Services\Front;

use App\Models\Electronic\ElectronicDetail;
use App\Models\Fashion\FashionDetail;
use App\Models\PropertyDetail;
use App\Models\Vehicle\VehicleDetail;

class CategoryWisePostDetailStoreService
{
    public static function storePostDetails(array $request, int $postId): void
    {
        switch ($request['category_id']) {
            case CategoryNameService::PROPERTY_FOR_RENT:
            case CategoryNameService::PROPERTY_FOR_SALE:
                $property = PropertyDetail::findOrNew($request['post_detail_id'] ?? "");
                $property->post_id = $postId;

                $property->size = $request[self::setInputName('size')] ?? null;
                $property->age_of_building = $request[self::setInputName('age_of_building')] ?? null;
                $property->number_of_room = $request[self::setInputName('number_of_room')] ?? null;
                $property->number_of_washroom = $request[self::setInputName('number_of_washroom')] ?? null;
                $property->number_of_floor = $request[self::setInputName('number_of_floor')] ?? null;
                $property->floor_number = $request[self::setInputName('floor_number')] ?? null;
                $property->furniture_status = $request[self::setInputName('furniture_status')] ?? null;
                $property->elevator = $request[self::setInputName('elevator')] ?? null;
                $property->usage_status	 = $request[self::setInputName('usage_status')] ?? null;
                $property->condition_status	 = $request[self::setInputName('condition_status')] ?? null;
                $property->save();

                break;
            case CategoryNameService::VEHICLE_FOR_RENT:
            case CategoryNameService::VEHICLE_FOR_SALE:
               $vehicle = VehicleDetail::findOrNew($request['post_detail_id'] ?? "");
               $vehicle->post_id = $postId;
               $vehicle->brand_id = $request[self::setInputName('brand_id')] ?? null;

               $vehicle->model_year = $request[self::setInputName('model_year')] ?? null;
               $vehicle->model_number = $request[self::setInputName('model_number')] ?? null;
               $vehicle->km = $request[self::setInputName('km')] ?? null;
               $vehicle->color_id = $request[self::setInputName('color_id')] ?? null;
               $vehicle->fuel_type = $request[self::setInputName('fuel_type')] ?? null;
               $vehicle->transmission = $request[self::setInputName('transmission')] ?? null;
               $vehicle->body_type_id = $request[self::setInputName('body_type_id')] ?? null;
               $vehicle->driver_side = $request[self::setInputName('driver_side')] ?? null;
               $vehicle->seat = $request[self::setInputName('seat')] ?? null;
               $vehicle->engine_capacity = $request[self::setInputName('engine_capacity')] ?? null;
               $vehicle->engine_power = $request[self::setInputName('engine_power')] ?? null;
               $vehicle->cylinder = $request[self::setInputName('cylinder')] ?? null;
               $vehicle->carriage_capacity = $request[self::setInputName('carriage_capacity')] ?? null;
               $vehicle->number_of_tire = $request[self::setInputName('number_of_tire')] ?? null;
               $vehicle->exchangeable = $request[self::setInputName('exchangeable')] ?? null;
               $vehicle->usage_condition = $request[self::setInputName('usage_condition')] ?? null;
               $vehicle->auto_part_type_id = $request[self::setInputName('auto_part_type_id')] ?? null;
               $vehicle->heavy_equipment_type_id = $request[self::setInputName('heavy_equipment_type_id')] ?? null;
               $vehicle->boat_type_id = $request[self::setInputName('boat_type_id')] ?? null;
               $vehicle->price_per_month = $request[self::setInputName('price_per_month')] ?? null;
               $vehicle->save();
                break;

            case CategoryNameService::FASHION:
                $fashion = FashionDetail::findOrNew($request['post_detail_id'] ?? "");
                $fashion->post_id = $postId;
                $fashion->brand_name = setTranslation([
                    'so' => $request['brand_name_so'] ?? null,
                    'en' => $request['brand_name_en'] ?? null,
                    'ar' => $request['brand_name_ar'] ?? null
                ]);
                $fashion->type_id = $request[self::setInputName('type')] ?? null;
                $fashion->size_id = $request[self::setInputName('size')] ?? null;
                $fashion->color_id = $request[self::setInputName('color')] ?? null;
                $fashion->material_id = $request[self::setInputName('material')] ?? null;
                $fashion->condition = $request[self::setInputName('condition')] ?? null;
                $fashion->occasion_id = $request[self::setInputName('occasion')] ?? null;
                $fashion->gender = $request[self::setInputName('gender')] ?? null;
                $fashion->gemstone_id = $request[self::setInputName('gemstone')] ?? null;
                $fashion->movement = $request[self::setInputName('movement')] ?? null;
                $fashion->save();
                break;
            case CategoryNameService::ELECTRONIC:
                $electronic = ElectronicDetail::findOrNew($request['post_detail_id'] ?? "");
                $electronic->post_id = $postId;
                $electronic->brand_id = $request[self::setInputName('brand')] ?? null;
                $electronic->type_id = $request[self::setInputName('type')] ?? null;
                $electronic->model = $request[self::setInputName('model')] ?? null;
                $electronic->color_id = $request[self::setInputName('color')] ?? null;
                $electronic->processor = $request[self::setInputName('processor')] ?? null;
                $electronic->generation = $request[self::setInputName('generation')] ?? null;
                $electronic->ram = $request[self::setInputName('ram')] ?? null;
                $electronic->storage_capacity = $request[self::setInputName('storage_capacity')] ?? null;
                $electronic->screen_size = $request[self::setInputName('screen_size')] ?? null;
                $electronic->graphic_card = $request[self::setInputName('graphic_card')] ?? null;
                $electronic->operating_system = $request[self::setInputName('operating_system')] ?? null;
                $electronic->display_technology = $request[self::setInputName('display_technology')] ?? null;
                $electronic->connectivity = $request[self::setInputName('connectivity')] ?? null;
                $electronic->condition = $request[self::setInputName('condition')] ?? null;
                $electronic->warranty = $request[self::setInputName('warranty')] ?? null;

                $electronic->game_name = setTranslation([
                    'so' => $request['game_name_so'] ?? null,
                    'en' => $request['game_name_en'] ?? null,
                    'ar' => $request['game_name_ar'] ?? null
                ]);

                $electronic->genre_id = $request[self::setInputName('genre')] ?? null;
                $electronic->platform_id = $request[self::setInputName('platform')] ?? null;
                $electronic->save();
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
