<?php

namespace App\Enums\Front;

class ContentType
{
    /**
     * Retrieve a map of enum keys and values.
     *
     * @return array
     */
    public static function getContentType() : array
    {
        return [
            '1' => 'How to sell on som souq?',
            '2' => 'How to buy on som souq?',
            '3' => 'Sell like a pro!',
        ];
    }

}
