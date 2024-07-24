<?php

namespace App\Services\Front;

use App\Enums\Front\ConditionStatus;
use App\Enums\Front\FuelType;
use App\Enums\Front\FurnitureStatus;
use App\Enums\Front\Transmissions;
use App\Models\AutoPartType;
use App\Models\BoatType;
use App\Models\BodyType;
use App\Models\Brand;
use App\Models\Color;
use App\Models\HeavyEquipmentType;

class LoadCategoryWiseDetailFormService
{
    protected static string|null $htmlFormName = null;
    protected static array $htmlFormData = [];

    const VIEW_PATH = "file_path";
    const DATA = 'data';
    public static function getCategoryWiseHtml(int $categoryId, int $subCategoryId, ? int $postId = null): array
    {
        static::$htmlFormData['sub_category_id'] = $subCategoryId;

        switch ($categoryId) {
            case CategoryNameService::PROPERTY_FOR_RENT:
            case CategoryNameService::PROPERTY_FOR_SALE:

                if (in_array($subCategoryId, [CategoryNameService::LAND_FOR_SALE, CategoryNameService::LAND_FOR_RENT])) {
                    static::$htmlFormName = "frontEnd.post.form.property_form_land";
                } else {
                    static::$htmlFormData['furniture_status'] = FurnitureStatus::getFurnitureStatus();
                    static::$htmlFormData['condition_status'] = ConditionStatus::getConditionStatus();
                    static::$htmlFormName = "frontEnd.post.form.property_form";
                }

                //post detail data for the edit page
                static::$htmlFormData['postDetail'] = ($postId) ? CategoryWisePostDetailDataService::getData(categoryId: $categoryId, postId: $postId) : "";

                break;

            case CategoryNameService::VEHICLE_FOR_RENT:
            case CategoryNameService::VEHICLE_FOR_SALE:
                static::$htmlFormData['brands'] = Brand::whereIn('category_id', [CategoryNameService::VEHICLE_FOR_RENT, CategoryNameService::VEHICLE_FOR_SALE])
                    ->where('is_active', true)->get(['name', 'id']);
                static::$htmlFormData['model_years'] = range(date('Y'), 1950);

                if (!in_array($subCategoryId, [25, 32])) {
                    static::$htmlFormData['colors'] = Color::where('is_active', 1)->get(['name', 'id']);
                }

                if (!in_array($subCategoryId, [23, 30])) {
                    static::$htmlFormData['fuel_types'] = FuelType::getFuelType();
                    static::$htmlFormData['transmissions'] = Transmissions::getTransmission();
                }

                if (in_array($subCategoryId, [19, 26])) {
                    static::$htmlFormData['body_types'] = BodyType::where('is_active', 1)->get(['name', 'id']);
                    static::$htmlFormName = "frontEnd.post.form.vehicle.car_form";

                } elseif (in_array($subCategoryId, [20, 27])) {
                    static::$htmlFormName = "frontEnd.post.form.vehicle.truck_form";

                } elseif (in_array($subCategoryId, [21, 28])) {
                    static::$htmlFormName = "frontEnd.post.form.vehicle.motorcycle_form";

                } elseif (in_array($subCategoryId, [22, 29])) {
                    static::$htmlFormName = "frontEnd.post.form.vehicle.bus_form";

                } elseif (in_array($subCategoryId, [23, 30])) {
                    static::$htmlFormData['autoPartTypes'] = AutoPartType::where('is_active', true)->get(['id', 'name']);
                    static::$htmlFormName = "frontEnd.post.form.vehicle.part_form";

                } elseif (in_array($subCategoryId, [24, 31])) {
                    static::$htmlFormData['heavyEquipmentTypes'] = HeavyEquipmentType::where('is_active', true)->get(['id', 'name']);
                    static::$htmlFormName = "frontEnd.post.form.vehicle.heavy_equipment_form";

                } elseif (in_array($subCategoryId, [25, 32])) {
                    static::$htmlFormData['boatTypes'] = BoatType::where('is_active', true)->get(['id', 'name']);
                    static::$htmlFormName = "frontEnd.post.form.vehicle.boat_form";

                }

                //post detail data for the edit page
                static::$htmlFormData['postDetail'] = ($postId) ? CategoryWisePostDetailDataService::getData(categoryId: $categoryId, postId: $postId) : "";

                break;
            default:
                break;
        }

        return [
            static::VIEW_PATH => static::$htmlFormName,
            static::DATA => static::$htmlFormData,
        ];
    }
}
