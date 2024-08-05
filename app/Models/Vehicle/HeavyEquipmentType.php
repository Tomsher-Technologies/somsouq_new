<?php

namespace App\Models\Vehicle;

use App;
use Illuminate\Database\Eloquent\Model;

class HeavyEquipmentType extends Model
{
   protected $table = 'heavy_equipment_types';

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
