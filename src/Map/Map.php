<?php
/*
 *
 * Created by Waldemar Graban 2021
 *
 */

namespace Waldekgraban\CartographicScaling\Map;

class Map extends MapInputDataValidator
{
    const SCALE_SEPARATOR = ':'; 

    protected $data;

    public function __construct(array $data)
    {
        if($this->checkMapInputData($data) === true){
            $this->scale         = $data['scale'];
            $this->distanceOnMap = $data['distanceOnMap'];
        } else {
            $this->checkMapInputData($data);
        }

    }

    public function __toString() {
        return "This map is on a scale of {$this->getOriginalScale()} where 1 cm is equal to {$this->getDistanceOnMapInKilometers()} kilometers\n";
    }

    private function checkMapInputData($data)
    {
        $response = $this->isValid($data);

        if($response !== true){
            echo 'Problem found while creating the map object. Below you will find a list of irregularities found:';
            foreach ($response as $key => $error) {
                foreach ($error as $key => $value) {
                    echo '<br/> - ' . $key . ' : ' . $value;
                };
            };
            die();
        }

        return $response;
    }

    public function getOriginalScale(): string
    {
        return $this->scale;
    }

    public function getScale(): int
    {
        return $this->convertScale();
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
