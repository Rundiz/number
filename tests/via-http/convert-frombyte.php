<?php

require dirname(dirname(__DIR__)).'/Rundiz/Number/Number.php';

$filesizes = array(
    100, 1000, 10000, 100000, 1000000, 10000000, 100000000, 1000000000, 10000000000, 200000000000, 1000000000000, 20000000000001, 100000000000000, 3000000000000000, 10000000000000000, 100000000000000000, 1000000000000000000, 10000000000000000000,
    130, 1300, 13300, 133300, 1333300, 13333300, 133333300, 1333333300, 13333333300, 133333333300, 1333333333300, 13333333333300,
);

$number = new Rundiz\Number\Number();

echo '<h3>Warning! this test may error on Windows or any 32bit system.</h3>';

echo '<strong>convert from bytes auto unit</strong><br>';
foreach ($filesizes as $size) {
    echo $size.' = '.$number->fromBytes($size).'<br>';
}
echo '<br>';

echo '<strong>convert from bytes KB unit</strong><br>';
foreach ($filesizes as $size) {
    echo $size.' = '.$number->fromBytes($size, 'KB').'<br>';
}
echo '<br>';

echo '<strong>convert from bytes KiB unit</strong><br>';
foreach ($filesizes as $size) {
    echo $size.' = '.$number->fromBytes($size, 'KiB').'<br>';
}
echo '<br>';

echo '<strong>convert from bytes GB unit</strong><br>';
foreach ($filesizes as $size) {
    echo $size.' = '.$number->fromBytes($size, 'GB').'<br>';
}
echo '<br>';

echo '<strong>convert from bytes YB unit</strong><br>';
foreach ($filesizes as $size) {
    echo $size.' = '.$number->fromBytes($size, 'YB').'<br>';
}
echo '<br>';

echo '<strong>convert from bytes ERROR unit</strong><br>';
foreach ($filesizes as $size) {
    echo $size.' = '.$number->fromBytes($size, 'ERROR').'<br>';
}
echo '<br>';

unset($number);