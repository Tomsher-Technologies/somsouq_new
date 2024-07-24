<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class HeavyEquipmentType extends Model
{
   protected $table = 'heavy_equipment_types';

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
