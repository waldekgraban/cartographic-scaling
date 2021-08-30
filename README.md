## Cartographic Scaling

Calculator of the actual distance on the map in the specified scale

## INTRODUCTION

The scale of the map is the ratio of the length of a specific section on the map to its actual length (in the field).
We can deal with a different record of the scale on the map:

**numerical** (fractional) scale - we always have 1 in the numerator,
in the denominator, a number expressing the multiple reduction in distance on the map,
**nominated scale** (e.g. 1: 50,000) - 1 cm on the map corresponds to 50,000 cm in the field,
**linear scale** (graduation) - graphical notation of the scale; makes it easier to read distances on the map.

There is also a field scale that is used to express the size of the reduction of the area on the map (e.g. the area of a lake, city). At this point, however, you need to remember about distortions on the maps (depending on the mapping used).

## Application

To begin with, we need to enter our map data:


    $mapData = [
        'scale'         => '1:15000',
        'distanceOnMap' => 10
    ];

The scales are always given in **numeric** format as a string with a **colon** as a separator.
Let the distance on the map be given in **centimeters** as int,
