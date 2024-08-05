<?php

namespace App\Models\Fashion;

use App;
use Illuminate\Database\Eloquent\Model;

class VariantValue extends Model
{
    protected $table = 'variant_value';

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
