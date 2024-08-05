<?php

namespace App\Models\Fashion;

use App;
use Illuminate\Database\Eloquent\Model;

class Gemstone extends Model
{
    protected $table = 'gemstones';

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
