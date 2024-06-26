<?php

namespace App\Enums\Front;

class ConditionStatus
{
    const FAIRLY_USED = 'fairly_used';
    const NEWLY_BUILD = 'newly_build';
    const OLD = 'old';

    /**
     * Retrieve a map of enum keys and values.
     *
     * @return array
     */
    public static function getConditionStatus() : array
    {
        return [
            static::FAIRLY_USED => 'Fairly Used',
            static::NEWLY_BUILD => 'Newly Build',
            static::OLD => 'Old',
        ];
    }

}
