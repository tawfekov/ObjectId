<?php

/**
 * this is very starting point of test , will change it later to phpunit
 */
include_once "../vendor/autoload.php";

$g = new \Tawfekov\ObjectId\ObjectId();
echo $g . "\n";
echo strlen($g) . "\n";

echo $g->getRandomNumber() ."\n" ;
echo $g->getProcessId() ."\n" ;
echo $g->getTimestamp() ."\n" ;


$g2 = new \Tawfekov\ObjectId\ObjectId("1412683702RGV2Z175083289");
echo $g2->getRandomNumber() ."\n" ;
echo $g2->getProcessId() ."\n" ;
echo $g2->getTimestamp() ."\n" ;

print_r($g2->getTime()) ."\n" ;