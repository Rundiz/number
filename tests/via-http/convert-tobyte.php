<?php

require dirname(dirname(__DIR__)).'/Rundiz/Number/Number.php';

$filesizes = array(
    45.60,
    '98.76543 KiB', '98.76543KiB',
    1000, '6960B', 
    '1.3KB', '1.3KiB', '1.30KiB',
    '9.7MB', '9.7MiB',
    '1.25GB', '1.25GiB',
    '8.02TB', '8.01TiB',
    '6PB', '6PiB',
    '7.003EB', '7.003EiB',
    '2.2ZB', '2.2ZiB',
    '3.1YB', '3.1YiB',
);

$number = new Rundiz\Number\Number();
foreach ($filesizes as $size) {
    echo $size . ' = ';
    $converted = $number->toBytes($size);
    if (is_numeric($converted)) {
        echo $converted;
    } else {
        var_export($converted);
    }
    echo '<br>' . PHP_EOL;
}
unset($number);