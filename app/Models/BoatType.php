<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class BoatType extends Model
{
   protected $table = 'boat_types';
    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
