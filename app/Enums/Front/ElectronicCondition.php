<?php

namespace App\Enums\Front;

class ElectronicCondition
{
    const NEW = 'brand_new';
    const USED = 'used';
    const REFURBISHED = 'refurbished';
    const FOR_PARTS = 'for_parts';

    /**
     * Retrieve a map of enum keys and values.
     *
     * @return array
     */
    public static function getElectronicCondition() : array
    {
        return [
            static::NEW => trans('post.brand_new'),
            static::USED => trans('post.used'),
            static::REFURBISHED => trans('post.refurbished'),
            static::FOR_PARTS => trans('post.for_parts'),
        ];
    }

}
