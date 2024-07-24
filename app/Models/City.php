<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class City extends Model
{
    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
