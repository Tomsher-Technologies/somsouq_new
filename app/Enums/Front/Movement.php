<?php

namespace App\Enums\Front;

class Movement
{
    const QUARTZ = 'quartz';
    const MECHANICAL = 'mechanical';
    const AUTOMATIC = 'automatic';
    const HYBRID = 'hybrid';

    /**
     * Retrieve a map of enum keys and values.
     *
     * @return array
     */
    public static function getMovement() : array
    {
        return [
            static::QUARTZ => trans('post.movements.quartz'),
            static::MECHANICAL => trans('post.movements.mechanical'),
            static::AUTOMATIC => trans('post.movements.automatic'),
            static::HYBRID => trans('post.movements.hybrid'),
        ];
    }

}
