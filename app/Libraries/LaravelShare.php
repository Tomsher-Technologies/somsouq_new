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

    public function twitter()
    {
        $this->link['twitter'] = 'https://twitter.com/intent/tweet?text=Share+title&url=' . $this->route;
        return $this;
    }

    public function whatsapp()
    {
        $this->link['whatsapp'] = 'https://wa.me/?text=' . $this->route;
        return $this;
    }

    public function getLinks() :array
    {
        return $this->link;
    }
}
