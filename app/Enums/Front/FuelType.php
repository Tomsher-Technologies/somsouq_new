<?php

namespace App\Enums\Front;

class FuelType
{
    const PETROL = 'petrol';
    const DIESEL = 'diesel';
    const ELECTRIC = 'electric';
    const HYBRID = 'hybrid';
    const GASOLINE = 'gasoline';
    const LPG = 'lpg';
    const GAS = 'gas';

    /**
     * Retrieve a map of enum keys and values.
     *
     * @return array
     */
    public static function getFuelType() : array
    {
        return [
            static::PETROL => trans('post.petrol'),
            static::DIESEL => trans('post.diesel'),
            static::ELECTRIC => trans('post.electric'),
            static::HYBRID => trans('post.hybrid'),
            static::GASOLINE => trans('post.gasoline'),
            static::LPG => trans('post.lpg'),
            static::GAS => trans('post.gas'),
        ];
    }

}
