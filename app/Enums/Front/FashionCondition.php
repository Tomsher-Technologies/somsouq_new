<?php

namespace App\Enums\Front;

class FashionCondition
{
    const NEW = 'new';
    const USED = 'used';
    const REFURBISHED = 'refurbished';

    /**
     * Retrieve a map of enum keys and values.
     *
     * @return array
     */
    public static function getFashionCondition() : array
    {
        return [
            static::NEW => trans('post.new'),
            static::USED => trans('post.used'),
            static::REFURBISHED => trans('post.refurbished'),
        ];
    }

}
