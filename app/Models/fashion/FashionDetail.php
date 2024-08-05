<?php

namespace App\Models\Fashion;

use App;
use Illuminate\Database\Eloquent\Model;

class FashionDetail extends Model
{
    protected $table = 'fashion_details';

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
