<?php
/*
 *
 * Created by Waldemar Graban 2021
 *
 */

namespace Waldekgraban\CartographicScaling;

require_once "../vendor/autoload.php";

use Waldekgraban\CartographicScaling\Map\Map;

//example of use
$mapData = [
    'scale'         => '1:15000',    //with ":" as scale separator
    'distanceOnMap' => 10            //in cm
];

$map = new Map($mapData);
echo $map->getDistanceOnMapInMeters();
