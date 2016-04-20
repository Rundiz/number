<?php


require __DIR__.'/Autoload.php';

$Autoload = new \Rundiz\Number\Tests\Autoload();
$Autoload->addNamespace('Rundiz\\Number\\Tests', __DIR__);
$Autoload->addNamespace('Rundiz\\Number', dirname(dirname(__DIR__)).'/Rundiz/Number');
$Autoload->register();