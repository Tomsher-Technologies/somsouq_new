<?php

namespace App\Enums\Front;

class Connectivity
{
    const WIRED = 'wired';
    const WIRELESS = 'wireless';
    const BOTH = 'both';

    /**
     * Retrieve a map of enum keys and values.
     *
     * @return array
     */
    public static function getConnectivity() : array
    {
        return [
            static::WIRED => trans('post.wired'),
            static::WIRELESS => trans('post.wireless'),
            static::BOTH => trans('post.both')
        ];
    }

}
