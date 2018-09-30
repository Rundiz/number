<?php

require dirname(dirname(__DIR__)).'/Rundiz/Number/Number.php';
require dirname(dirname(__DIR__)).'/Rundiz/Number/NumberEng.php';
require dirname(dirname(__DIR__)).'/Rundiz/Number/NumberThai.php';

require __DIR__ . '/_convert-numbers-set-test.php';
require __DIR__ . '/_functions.php';


$results = [];
$Number = new \Rundiz\Number\Number();
$i = 0;
foreach ($numbers as $num) {
    $results[$i]['number'] = $num;
    $results[$i]['resultEng'] = $Number->convertBaht($num, true, 'Eng');
    $results[$i]['resultThai'] = $Number->convertBaht($num);
    $i++;
}

unset($i, $Number);


echo '<meta charset="utf-8">' . PHP_EOL;
echo '<h1>For merge the results in Thai/English and use in PHPUnit test.</h1>' . PHP_EOL;
echo '<pre>'.var_export54($results).'</pre>' . PHP_EOL;