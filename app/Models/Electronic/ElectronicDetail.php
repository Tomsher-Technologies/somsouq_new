<?php

namespace App\Models\Electronic;

use App;
use Illuminate\Database\Eloquent\Model;

class ElectronicDetail extends Model
{
    protected $table = 'electronic_details';

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
