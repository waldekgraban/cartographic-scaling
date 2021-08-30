<?php
/*
 *
 * Created by Waldemar Graban 2021
 *
 */

namespace Waldekgraban\CartographicScaling\Map;

class MapInputDataValidator
{
    protected function isValid($data)
    {
        $validatorInfo = $this->inputDataValidator($data);

        return empty($validatorInfo)
            ? true 
            : $validatorInfo;
    }

    protected function inputDataValidator($data)
    {
        $mapDataValidator = $this->inputMapDataViewer($data);

        $errors = [];

        foreach ($mapDataValidator as $key => $value) {
            if($value !== true){
                $errors[] = [
                    $key => 'Failure'
                ];
            }
        }

        return $errors;
    }

    protected function inputMapDataViewer($data): array
    {
        return [
            'input_data_is_array'                  => $this->checkInputDataIsArray($data),
            'scale_is_string'                      => $this->checkScaleIsString($data),
            'scale_is_not_empty'                   => $this->checkScaleIsNotEmpty($data),
            'the_scale_has_a_colon_as_a_separator' => $this->checkScaleHasColonAsSeparator($data),
            'distance_on_map_is_numeric'           => $this->checkDistanceOnMapIsNumeric($data),
            'distance_on_map_is_not_empty'         => $this->checkDistanceOnMapIsNotEmpty($data)
        ];
    }

    private function checkInputDataIsArray($data): bool
    {
        return (isset($data) && is_array($data)) ? true : false;
    }

    private function checkScaleIsNotEmpty($data): bool
    {
        return (isset($data['scale']) && !empty($data['scale'])) ? true : false;
    }

    private function checkScaleIsString($data): bool
    {
        return (isset($data['scale']) && is_string($data['scale'])) ? true : false;
    }

    private function checkScaleHasColonAsSeparator($data): bool
    {
        return (isset($data['scale']) && strpos($data['scale'], ':') !== false) ? true : false;
    }

    private function checkDistanceOnMapIsNumeric($data): bool
    {
        return (isset($data['distanceOnMap']) && is_numeric($data['distanceOnMap'])) ? true : false;
    }

    private function checkDistanceOnMapIsNotEmpty($data): bool
    {
        return (isset($data['distanceOnMap']) && !empty($data['distanceOnMap'])) ? true : false;
    }    
}
