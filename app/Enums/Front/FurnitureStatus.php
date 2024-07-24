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
            static::FURNISHED => trans('post.furnished'),
            static::SEMI_FURNISHED => trans('post.semi_furnished'),
            static::NOT_FURNISHED => trans('post.not_furnished'),
        ];
    }

}
