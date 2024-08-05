<?php

namespace App\Models\Fashion;

use App;
use Illuminate\Database\Eloquent\Model;

class Occasion extends Model
{
    protected $table = 'occasions';

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
