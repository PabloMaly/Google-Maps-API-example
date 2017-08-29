<?php

$latitud    = $_REQUEST["latitud"];
$latitud2   = $_REQUEST["latitud2"];
$longitud   = $_REQUEST["longitud"];
$longitud2  = $_REQUEST["longitud2"];

function distanciaGeodesica($lat1, $long1, $lat2, $long2){ 
$degtorad = 0.01745329; 
$radtodeg = 57.29577951; 

$dlong = ($long1 - $long2); 
$dvalue = (sin($lat1 * $degtorad) * sin($lat2 * $degtorad)) 
+ (cos($lat1 * $degtorad) * cos($lat2 * $degtorad) 
* cos($dlong * $degtorad)); 

$dd = acos($dvalue) * $radtodeg; 

$miles = ($dd * 69.16); 
$km = ($dd * 111.302); 

return round($km,0); 
} 


echo distanciaGeodesica($latitud,$longitud,$latitud2,$longitud2);
?>