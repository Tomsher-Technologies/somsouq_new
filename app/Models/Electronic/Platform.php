<?php

namespace App\Models\Electronic;

use App;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $table = 'platforms';

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
