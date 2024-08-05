<?php

namespace App\Models\Vehicle;

use App;
use Illuminate\Database\Eloquent\Model;

class BoatType extends Model
{
   protected $table = 'boat_types';
    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
