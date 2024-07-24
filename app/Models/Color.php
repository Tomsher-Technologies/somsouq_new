<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Color extends Model
{
   protected $table = 'colors';

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
