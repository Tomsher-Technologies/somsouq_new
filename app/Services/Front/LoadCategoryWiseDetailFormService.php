<?php

namespace App\Services\Front;

use App\Enums\Front\ConditionStatus;
use App\Enums\Front\Connectivity;
use App\Enums\Front\DisplayTechnology;
use App\Enums\Front\ElectronicCondition;
use App\Enums\Front\FashionCondition;
use App\Enums\Front\FuelType;
use App\Enums\Front\FurnitureStatus;
use App\Enums\Front\Movement;
use App\Enums\Front\Transmissions;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Electronic\ElectronicType;
use App\Models\Electronic\Genre;
use App\Models\Electronic\Platform;
use App\Models\Fashion\FashionType;
use App\Models\Fashion\Gemstone;
use App\Models\Fashion\Material;
use App\Models\Fashion\Occasion;
use App\Models\Vehicle\AutoPartType;
use App\Models\Vehicle\BoatType;
use App\Models\Vehicle\BodyType;
use App\Models\Vehicle\HeavyEquipmentType;

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
            case CategoryNameService::FASHION:
                static::$htmlFormData['colors'] = Color::where('is_active', 1)->get(['name', 'id']);
                static::$htmlFormData['conditions'] = FashionCondition::getFashionCondition();

                if (in_array($subCategoryId, [33])) {
                    static::$htmlFormData['clothType'] = FashionType::where('sub_category_id', $subCategoryId)->where('is_active', 1)->get();
                    static::$htmlFormData['materials'] = Material::where('sub_category_id', $subCategoryId)->where('is_active', 1)->get();
                    static::$htmlFormData['occasions'] = Occasion::where('sub_category_id', $subCategoryId)->where('is_active', 1)->get();

                    static::$htmlFormName = "frontEnd.post.form.fashion.men_cloth";
                } elseif (in_array($subCategoryId, [34])) {
                    static::$htmlFormData['clothType'] = FashionType::where('sub_category_id', $subCategoryId)->where('is_active', 1)->get();
                    static::$htmlFormData['materials'] = Material::where('sub_category_id', $subCategoryId)->where('is_active', 1)->get();
                    static::$htmlFormData['occasions'] = Occasion::where('sub_category_id', $subCategoryId)->where('is_active', 1)->get();

                    static::$htmlFormName = "frontEnd.post.form.fashion.women_cloth";
                } elseif (in_array($subCategoryId, [35])) {
                    static::$htmlFormData['clothType'] = FashionType::where('sub_category_id', $subCategoryId)->where('is_active', 1)->get();
                    static::$htmlFormData['materials'] = Material::where('sub_category_id', $subCategoryId)->where('is_active', 1)->get();
                    static::$htmlFormData['occasions'] = Occasion::where('sub_category_id', $subCategoryId)->where('is_active', 1)->get();

                    static::$htmlFormName = "frontEnd.post.form.fashion.kid_cloth";
                } elseif (in_array($subCategoryId, [36])) {
                    static::$htmlFormData['jewelleryType'] = FashionType::where('sub_category_id', $subCategoryId)->where('is_active', 1)->get();
                    static::$htmlFormData['occasions'] = Occasion::where('sub_category_id', $subCategoryId)->where('is_active', 1)->get();
                    static::$htmlFormData['gemstones'] = Gemstone::where('is_active', 1)->get();

                    static::$htmlFormName = "frontEnd.post.form.fashion.jewellery";
                } elseif (in_array($subCategoryId, [37])) {
                    static::$htmlFormData['shoesType'] = FashionType::where('sub_category_id', $subCategoryId)->where('is_active', 1)->get();
                    static::$htmlFormData['materials'] = Material::where('sub_category_id', $subCategoryId)->where('is_active', 1)->get();
                    static::$htmlFormData['occasions'] = Occasion::where('sub_category_id', $subCategoryId)->where('is_active', 1)->get();

                    static::$htmlFormName = "frontEnd.post.form.fashion.shoes";
                } elseif (in_array($subCategoryId, [38])) {
                    static::$htmlFormData['watchType'] = FashionType::where('sub_category_id', $subCategoryId)->where('is_active', 1)->get();
                    static::$htmlFormData['materials'] = Material::where('sub_category_id', $subCategoryId)->where('is_active', 1)->get();
                    static::$htmlFormData['occasions'] = Occasion::where('sub_category_id', $subCategoryId)->where('is_active', 1)->get();
                    static::$htmlFormData['movements'] = Movement::getMovement();

                    static::$htmlFormName = "frontEnd.post.form.fashion.watch";
                } elseif (in_array($subCategoryId, [39])) {
                    static::$htmlFormData['bagType'] = FashionType::where('sub_category_id', $subCategoryId)->where('is_active', 1)->get();
                    static::$htmlFormData['materials'] = Material::where('sub_category_id', $subCategoryId)->where('is_active', 1)->get();
                    static::$htmlFormData['occasions'] = Occasion::where('sub_category_id', $subCategoryId)->where('is_active', 1)->get();

                    static::$htmlFormName = "frontEnd.post.form.fashion.bag";
                }

                //post detail data for the edit page
                static::$htmlFormData['postDetail'] = ($postId) ? CategoryWisePostDetailDataService::getData(categoryId: $categoryId, postId: $postId) : "";
                break;

            case CategoryNameService::ELECTRONIC:
                static::$htmlFormData['brands'] = Brand::where('category_id', CategoryNameService::ELECTRONIC)->where('is_active', true)->get(['name', 'id']);
                static::$htmlFormData['conditions'] = ElectronicCondition::getElectronicCondition();
                static::$htmlFormData['colors'] = Color::where('is_active', 1)->get(['name', 'id']);

                if (in_array($subCategoryId, [40])) {
                    static::$htmlFormData['types'] = ElectronicType::where('sub_category_id', 40)->where('is_active', true)->get(['name', 'id']);

                    static::$htmlFormName = "frontEnd.post.form.electronic.electronic_accessories";
                } elseif (in_array($subCategoryId, [41])) {
                    static::$htmlFormData['types'] = ElectronicType::where('sub_category_id', 41)->where('is_active', true)->get(['name', 'id']);
                    static::$htmlFormName = "frontEnd.post.form.electronic.laptop_desktop";
                } elseif (in_array($subCategoryId, [42])) {
                    static::$htmlFormData['types'] = ElectronicType::where('sub_category_id', 42)->where('is_active', true)->get(['name', 'id']);

                    static::$htmlFormName = "frontEnd.post.form.electronic.tv_equipment";
                } elseif (in_array($subCategoryId, [43])) {
                    static::$htmlFormData['types'] = ElectronicType::where('sub_category_id', 43)->where('is_active', true)->get(['name', 'id']);

                    static::$htmlFormName = "frontEnd.post.form.electronic.audio";
                } elseif (in_array($subCategoryId, [44])) {
                    static::$htmlFormData['types'] = ElectronicType::where('sub_category_id', 44)->where('is_active', true)->get(['name', 'id']);

                    static::$htmlFormName = "frontEnd.post.form.electronic.computer_accessories";
                } elseif (in_array($subCategoryId, [45])) {
                    static::$htmlFormData['display'] = DisplayTechnology::getDisplayTechnology();

                    static::$htmlFormName = "frontEnd.post.form.electronic.computer_monitor";
                } elseif (in_array($subCategoryId, [46])) {
                    static::$htmlFormData['types'] = ElectronicType::where('sub_category_id', 46)->where('is_active', true)->get(['name', 'id']);

                    static::$htmlFormName = "frontEnd.post.form.electronic.network";
                } elseif (in_array($subCategoryId, [47])) {
                    static::$htmlFormData['types'] = ElectronicType::where('sub_category_id', 47)->where('is_active', true)->get(['name', 'id']);
                    static::$htmlFormData['connectivities'] = Connectivity::getConnectivity();

                    static::$htmlFormName = "frontEnd.post.form.electronic.printer_scanner";
                } elseif (in_array($subCategoryId, [48])) {
                    static::$htmlFormData['types'] = ElectronicType::where('sub_category_id', 48)->where('is_active', true)->get(['name', 'id']);

                    static::$htmlFormName = "frontEnd.post.form.electronic.security_surveillance";
                } elseif (in_array($subCategoryId, [49])) {
                    static::$htmlFormData['types'] = ElectronicType::where('sub_category_id', 49)->where('is_active', true)->get(['name', 'id']);

                    static::$htmlFormName = "frontEnd.post.form.electronic.photography";
                } elseif (in_array($subCategoryId, [50])) {
                    static::$htmlFormData['types'] = ElectronicType::where('sub_category_id', 50)->where('is_active', true)->get(['name', 'id']);

                    static::$htmlFormName = "frontEnd.post.form.electronic.kitchen";
                } elseif (in_array($subCategoryId, [51])) {
                    static::$htmlFormData['types'] = ElectronicType::where('sub_category_id', 51)->where('is_active', true)->get(['name', 'id']);
                    static::$htmlFormData['connectivities'] = Connectivity::getConnectivity();

                    static::$htmlFormName = "frontEnd.post.form.electronic.headphone";
                } elseif (in_array($subCategoryId, [52])) {
                    static::$htmlFormData['genres'] = Genre::where('is_active', true)->get(['name', 'id']);
                    static::$htmlFormData['platforms'] = Platform::where('is_active', true)->get(['name', 'id']);
                    static::$htmlFormData['colors'] = [];
                    static::$htmlFormData['brands'] = [];

                    static::$htmlFormName = "frontEnd.post.form.electronic.game";
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
