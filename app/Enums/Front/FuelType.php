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
            static::PETROL => 'Petrol',
            static::DIESEL => 'Diesel',
            static::ELECTRIC => 'Electric',
            static::HYBRID => 'Hybrid',
            static::GASOLINE => 'Gasoline',
            static::LPG => 'LPG',
            static::GAS => 'Gas',

        ];
    }

}
