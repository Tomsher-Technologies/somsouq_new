<?php

namespace App\Services\Front;

use App\Models\Fashion\FashionDetail;
use App\Models\PropertyDetail;
use App\Models\Vehicle\VehicleDetail;

class CategoryWiseDetailViewService
{
    protected static string|null $htmlFormName = null;
    protected static array $htmlFormData = [];

    const VIEW_PATH = "file_path";
    const DATA = 'data';
    public static function getView(int $categoryId, int $subCategoryId, int $postId, string $viewType): array
    {
        static::$htmlFormData['sub_category_id'] = $subCategoryId;

        switch ($categoryId) {
            case CategoryNameService::PROPERTY_FOR_RENT:
            case CategoryNameService::PROPERTY_FOR_SALE:
                static::$htmlFormData['postDetail'] = PropertyDetail::where('post_id', $postId)->first();

                if (in_array($subCategoryId, [CategoryNameService::LAND_FOR_SALE, CategoryNameService::LAND_FOR_RENT])) {
                    if ($viewType == 'user') {
                        static::$htmlFormName = "frontEnd.post.views.property_view_land";
                    }elseif ($viewType == 'public'){
                        static::$htmlFormName = "frontEnd.post.publicView.property_view_land";
                    }
                } else {
                    if ($viewType == 'user') {
                        static::$htmlFormName = "frontEnd.post.views.property_view";
                    }elseif ($viewType == 'public'){
                        static::$htmlFormName = "frontEnd.post.publicView.property_view";
                    }
                }

                break;

            case CategoryNameService::VEHICLE_FOR_RENT:
            case CategoryNameService::VEHICLE_FOR_SALE:

            $query = VehicleDetail::query();
            $query->leftJoin('brands', 'brands.id', '=', 'vehicle_details.brand_id')
                  ->leftJoin('colors', 'colors.id', '=', 'vehicle_details.color_id');

                if (in_array($subCategoryId, [19, 26])) {
                    $query->leftJoin('body_types', 'body_types.id', '=', 'vehicle_details.body_type_id')
                        ->leftJoin('posts', 'vehicle_details.post_id', '=', 'posts.id')
                        ->select('vehicle_details.*', 'posts.price', 'brands.name as brand_name', 'colors.name as color_name', 'body_types.name as body_type_name');

                    if ($viewType == 'user') {
                        static::$htmlFormName = "frontEnd.post.views.vehicle.car_view";
                    }elseif ($viewType == 'public'){
                        static::$htmlFormName = "frontEnd.post.publicView.vehicle.car_view";
                    }

                } elseif (in_array($subCategoryId, [20, 27])) {
                    $query->select('vehicle_details.*', 'brands.name as brand_name', 'colors.name as color_name');
                    static::$htmlFormName = "frontEnd.post.views.vehicle.truck_view";

                    if ($viewType == 'user') {
                        static::$htmlFormName = "frontEnd.post.views.vehicle.truck_view";
                    }elseif ($viewType == 'public'){
                        static::$htmlFormName = "frontEnd.post.publicView.vehicle.truck_view";
                    }

                } elseif (in_array($subCategoryId, [21, 28])) {
                    $query->select('vehicle_details.*', 'brands.name as brand_name', 'colors.name as color_name');

                    if ($viewType == 'user') {
                        static::$htmlFormName = "frontEnd.post.views.vehicle.motorcycle_view";
                    }elseif ($viewType == 'public'){
                        static::$htmlFormName = "frontEnd.post.publicView.vehicle.motorcycle_view";
                    }

                } elseif (in_array($subCategoryId, [22, 29])) {
                    $query->select('vehicle_details.*', 'brands.name as brand_name', 'colors.name as color_name');

                    if ($viewType == 'user') {
                        static::$htmlFormName = "frontEnd.post.views.vehicle.bus_view";
                    }elseif ($viewType == 'public'){
                        static::$htmlFormName = "frontEnd.post.publicView.vehicle.bus_view";
                    }

                } elseif (in_array($subCategoryId, [23, 30])) {
                    $query->leftJoin('auto_part_types', 'auto_part_types.id', '=', 'vehicle_details.auto_part_type_id')
                        ->select('vehicle_details.*', 'brands.name as brand_name', 'colors.name as color_name', 'auto_part_types.name as auto_part_name');

                    if ($viewType == 'user') {
                        static::$htmlFormName = "frontEnd.post.views.vehicle.part_view";
                    }elseif ($viewType == 'public'){
                        static::$htmlFormName = "frontEnd.post.publicView.vehicle.part_view";
                    }

                } elseif (in_array($subCategoryId, [24, 31])) {
                    $query->leftJoin('heavy_equipment_types', 'heavy_equipment_types.id', '=', 'vehicle_details.heavy_equipment_type_id')
                        ->select('vehicle_details.*', 'brands.name as brand_name', 'colors.name as color_name', 'heavy_equipment_types.name as heavy_equipment_type_name');

                    if ($viewType == 'user') {
                        static::$htmlFormName = "frontEnd.post.views.vehicle.heavy_equipment_view";
                    }elseif ($viewType == 'public'){
                        static::$htmlFormName = "frontEnd.post.publicView.vehicle.heavy_equipment_view";
                    }

                } elseif (in_array($subCategoryId, [25, 32])) {
                    $query->leftJoin('boat_types', 'boat_types.id', '=', 'vehicle_details.boat_type_id')
                        ->select('vehicle_details.*',  'brands.name as brand_name', 'colors.name as color_name', 'boat_types.en_name as boat_type_name');

                    if ($viewType == 'user') {
                        static::$htmlFormName = "frontEnd.post.views.vehicle.boat_view";
                    }elseif ($viewType == 'public'){
                        static::$htmlFormName = "frontEnd.post.publicView.vehicle.boat_view";
                    }

                }

                static::$htmlFormData['postDetail'] = $query->where('vehicle_details.post_id', $postId)->first();

                break;

            case CategoryNameService::FASHION:
                $query = FashionDetail::query()
                    ->leftJoin('colors', 'colors.id', '=', 'fashion_details.color_id')
                    ->leftJoin('fashion_types', 'fashion_types.id', '=', 'fashion_details.type_id')
                    ->leftJoin('materials', 'materials.id', '=', 'fashion_details.material_id')
                    ->leftJoin('occasions', 'occasions.id', '=', 'fashion_details.occasion_id');

                if (in_array($subCategoryId, [33])) {
                    $query->leftJoin('variant_value', 'variant_value.id', '=', 'fashion_details.size_id')
                            ->select(
                                'fashion_details.*',
                                'colors.name as color_name',
                                'fashion_types.name as type_name',
                                'variant_value.name as size',
                                'materials.name as material_name',
                                'occasions.name as occasion_name',
                            );
                    if ($viewType == 'user') {
                        static::$htmlFormName = "frontEnd.post.views.fashion.men_cloth";
                    }elseif ($viewType == 'public'){
                        static::$htmlFormName = "frontEnd.post.publicView.fashion.men_cloth";
                    }
                } elseif (in_array($subCategoryId, [34])) {
                    $query->leftJoin('variant_value', 'variant_value.id', '=', 'fashion_details.size_id')
                        ->select(
                            'fashion_details.*',
                            'colors.name as color_name',
                            'fashion_types.name as type_name',
                            'variant_value.name as size',
                            'materials.name as material_name',
                            'occasions.name as occasion_name',
                        );
                    if ($viewType == 'user') {
                        static::$htmlFormName = "frontEnd.post.views.fashion.women_cloth";
                    }elseif ($viewType == 'public'){
                        static::$htmlFormName = "frontEnd.post.publicView.fashion.women_cloth";
                    }
                } elseif (in_array($subCategoryId, [35])) {
                    $query->leftJoin('variant_value', 'variant_value.id', '=', 'fashion_details.size_id')
                        ->select(
                            'fashion_details.*',
                            'colors.name as color_name',
                            'fashion_types.name as type_name',
                            'variant_value.name as size',
                            'materials.name as material_name',
                            'occasions.name as occasion_name',
                        );

                    if ($viewType == 'user') {
                        static::$htmlFormName = "frontEnd.post.views.fashion.kid";
                    }elseif ($viewType == 'public'){
                        static::$htmlFormName = "frontEnd.post.publicView.fashion.kid";
                    }

                } elseif (in_array($subCategoryId, [36])) {
                    $query->leftJoin('gemstones', 'gemstones.id', '=', 'fashion_details.gemstone_id')
                        ->select(
                            'fashion_details.*',
                            'colors.name as color_name',
                            'fashion_types.name as type_name',
                            'gemstones.name as stone_name',
                            'materials.name as material_name',
                            'occasions.name as occasion_name',
                        );

                    if ($viewType == 'user') {
                        static::$htmlFormName = "frontEnd.post.views.fashion.jewellery";
                    }elseif ($viewType == 'public') {
                        static::$htmlFormName = "frontEnd.post.publicView.fashion.jewellery";
                    }
                } elseif (in_array($subCategoryId, [37])) {
                    $query->leftJoin('variant_value', 'variant_value.id', '=', 'fashion_details.size_id')
                        ->select(
                            'fashion_details.*',
                            'colors.name as color_name',
                            'fashion_types.name as type_name',
                            'variant_value.name as size',
                            'materials.name as material_name',
                            'occasions.name as occasion_name',
                        );

                    if ($viewType == 'user') {
                        static::$htmlFormName = "frontEnd.post.views.fashion.shoes";
                    }elseif ($viewType == 'public') {
                        static::$htmlFormName = "frontEnd.post.publicView.fashion.shoes";
                    }
                } elseif (in_array($subCategoryId, [38])) {
                    $query->select(
                            'fashion_details.*',
                            'colors.name as color_name',
                            'fashion_types.name as type_name',
                            'materials.name as material_name',
                            'occasions.name as occasion_name',
                        );

                    if ($viewType == 'user') {
                        static::$htmlFormName = "frontEnd.post.views.fashion.watch";
                    }elseif ($viewType == 'public') {
                        static::$htmlFormName = "frontEnd.post.publicView.fashion.watch";
                    }
                } elseif (in_array($subCategoryId, [39])) {
                    $query->leftJoin('variant_value', 'variant_value.id', '=', 'fashion_details.size_id')
                        ->select(
                            'fashion_details.*',
                            'colors.name as color_name',
                            'fashion_types.name as type_name',
                            'variant_value.name as size',
                            'materials.name as material_name',
                            'occasions.name as occasion_name',
                        );

                    if ($viewType == 'user') {
                        static::$htmlFormName = "frontEnd.post.views.fashion.bag";
                    }elseif ($viewType == 'public') {
                        static::$htmlFormName = "frontEnd.post.publicView.fashion.bag";
                    }
                }

                static::$htmlFormData['postDetail'] = $query->where('fashion_details.post_id', $postId)->first();
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
