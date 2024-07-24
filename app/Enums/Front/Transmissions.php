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
            static::MANUAL => trans('post.manual'),
            static::AUTOMATIC => trans('post.automatic'),
            static::AUTO_MANUAL => trans('post.auto_manual'),
            static::AMT => trans('post.amt'),
            static::CVT => trans('post.cvt'),
        ];
    }

}
