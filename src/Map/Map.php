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

    protected $data;

    public function __construct(array $data)
    {
        $this->scale         = isset($data['scale'])         ? $data['scale']         : 1;
        $this->distanceOnMap = isset($data['distanceOnMap']) ? $data['distanceOnMap'] : 1;
    }

    public function getOriginalScale(): string
    {
        return $this->scale;
    }

    public function getScale(): int
    {
        $scale = $this->convertScale();
        return $scale;
    }

    private function convertScale(): int
    {
        return end((explode(Map::SCALE_SEPARATOR, $this->getOriginalScale(), 2)));
    }

    public function getOriginalDistanceOnMap(): int
    {
        return $this->distanceOnMap;
    }

    public function getDistanceOnMapInMM(): float
    {
        return $this->convertCentimetersToMillimeters();
    }

    private function convertCentimetersToMillimeters(): float
    {
        return $this->distanceOnMap * 10;
    }

    public function getDistanceOnMapInMeters(): float
    {
        return $this->convertCentimetersToMeters();
    }

    private function convertCentimetersToMeters(): float
    {
        return (float)($this->distanceOnMap / 100);
    }

    public function getDistanceOnMapInKilometers(): float
    {
        return $this->convertCentimetersToKilometers();
    }

    private function convertCentimetersToKilometers(): float
    {
        return (float)($this->distanceOnMap / 100000);
    }
}
