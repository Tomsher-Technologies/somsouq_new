<?php

namespace App\Models\Vehicle;

use App;
use Illuminate\Database\Eloquent\Model;

class AutoPartType extends Model
{
   protected $table = 'auto_part_types';

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
