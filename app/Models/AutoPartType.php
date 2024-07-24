<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class AutoPartType extends Model
{
   protected $table = 'auto_part_types';

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
