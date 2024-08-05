<?php

namespace App\Models\Fashion;

use App;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $table = 'variants';

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
