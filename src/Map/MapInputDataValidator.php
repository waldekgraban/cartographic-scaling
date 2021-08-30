<?php
/*
 *
 * Created by Waldemar Graban 2021
 *
 */

namespace Waldekgraban\CartographicScaling\Map;

class MapInputDataValidator
{
    protected function isValid($data): bool
    {
        $validatorInfo = $this->inputDataValidator($data);

        return isset($validatorInfo['result']) && $validatorInfo['result'] === true 
            ? true 
            : false;
    }

    protected function inputDataValidator($data): array
    {
        $validatorInfo = [];

        if(isset($data) && is_array($data)){
            
            $validatorInfo = ['input_data_is_array' => true];
            
            if(isset($data['scale']) && is_string($data['scale'])){
                $validatorInfo = ['scale_is_string' => true];

                if (strpos($data['scale'], ':') !== false) {
                    $validatorInfo = ['the scale has a colon as a separator' => true];
                }
            }

        } else {
            $validatorInfo = [
                'input_data_is_array'                  => false,
                'scale_is_string'                      => false,
                'the scale has a colon as a separator' => false
            ];
        }

        return $validatorInfo;
    }
}
