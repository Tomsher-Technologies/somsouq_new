<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class BodyType extends Model
{
   protected $table = 'body_types';

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
