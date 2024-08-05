<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Policy extends Model
{
    protected $table = 'policies';

    public function getTranslation($field = '', $lang = false)
    {
        $lang = $lang == false ? getLocaleLang() : $lang;

        if ($lang !== false) {
            $field = $field.'_'.$lang;
        }

        return $this->$field;
    }

    public function getTranslation2($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
