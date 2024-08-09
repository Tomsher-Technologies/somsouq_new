<?php

namespace App\Enums\Front;

class DisplayTechnology
{
    /**
     * Retrieve a map of enum keys and values.
     *
     * @return array
     */
    public static function getDisplayTechnology() : array
    {
        return [
            'CRT' => 'CRT',
            'IPS' => 'IPS',
            'OLED' => 'OLED',
            'TN' => 'TN',
            'VA' => 'VA',
        ];
    }

}
