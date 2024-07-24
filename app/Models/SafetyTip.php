<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
class SafetyTip extends Model
{
    protected $table = 'safety_tips';

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
