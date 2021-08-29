<?php
/*
 *
 * Created by Waldemar Graban 2021
 *
 */

namespace Waldekgraban\CartographicScaling\Map;

class Map
{
    const SCALE_SEPARATOR = ':'; 

    protected $scale;

    public function __construct($scale)
    {
        $this->scale = $scale;
    }

    public function getOriginalScale()
    {
        return $this->scale;
    }

    public function getScale()
    {
        $scale = $this->convertScale();
        return $scale;
    }

    private function convertScale(){
        return end((explode(Map::SCALE_SEPARATOR, $this->getOriginalScale(), 2)));
    }
}
