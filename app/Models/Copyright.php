<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
class Copyright extends Model
{
    protected $table = 'copyright_policies';

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
