<?php

namespace App\Libraries;

class LaravelShare
{
    private $route;
    private $link = [];

    public function __construct(string $route)
    {
        $this->route = $route;
    }

    public function facebook(): object
    {
        $this->link['facebook'] = 'https://www.facebook.com/sharer/sharer.php?u=' . $this->route;
        return $this;
    }

    public function getLinks() :array
    {
        return $this->link;
    }
}
