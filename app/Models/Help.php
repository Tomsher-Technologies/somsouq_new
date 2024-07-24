<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
class Help extends Model
{
    protected $table = 'helps';

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
