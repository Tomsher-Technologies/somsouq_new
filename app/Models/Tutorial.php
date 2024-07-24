<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
class Tutorial extends Model
{
    protected $table = 'tutorials';

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
