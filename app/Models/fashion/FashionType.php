<?php

namespace App\Models\Fashion;

use App;
use Illuminate\Database\Eloquent\Model;

class FashionType extends Model
{
    protected $table = 'fashion_types';

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
