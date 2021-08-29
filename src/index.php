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
$mapScale = '1:15000';

$map = new Map($mapScale);
echo $map->getScale(); 


