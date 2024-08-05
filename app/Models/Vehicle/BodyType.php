<?php

namespace App\Models\Vehicle;

use App;
use Illuminate\Database\Eloquent\Model;

class BodyType extends Model
{
   protected $table = 'body_types';

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
