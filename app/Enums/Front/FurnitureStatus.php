<?php

namespace App\Enums\Front;

class FurnitureStatus
{
    const FURNISHED = 'furnished';
    const SEMI_FURNISHED = 'semi_furnished';
    const NOT_FURNISHED = 'not_furnished';

    /**
     * Retrieve a map of enum keys and values.
     *
     * @return array
     */
    public static function getFurnitureStatus() : array
    {
        return [
            static::FURNISHED => 'Furnished',
            static::SEMI_FURNISHED => 'Semi Furnished',
            static::NOT_FURNISHED => 'Not Furnished',
        ];
    }

}
