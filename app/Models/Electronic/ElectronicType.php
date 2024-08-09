<?php

namespace App\Models\Electronic;

use App;
use Illuminate\Database\Eloquent\Model;

class ElectronicType extends Model
{
    protected $table = 'electronic_types';

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
