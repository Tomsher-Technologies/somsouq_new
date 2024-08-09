<?php

namespace App\Models\Electronic;

use App;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
