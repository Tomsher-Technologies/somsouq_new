<?php

namespace App\Enums\Front;

class Transmissions
{
    const MANUAL = 'manual';
    const AUTOMATIC = 'automatic';
    const AUTO_MANUAL = 'automanual';
    const AMT = 'amt';
    const CVT = 'cvt';

    /**
     * Retrieve a map of enum keys and values.
     *
     * @return array
     */
    public static function getTransmission() : array
    {
        return [
            static::MANUAL => 'Manual',
            static::AUTOMATIC => 'Automatic',
            static::AUTO_MANUAL => 'Auto-manual',
            static::AMT => 'AMT',
            static::CVT => 'CVT',
        ];
    }

}
