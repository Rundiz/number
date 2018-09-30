<?php

require dirname(dirname(__DIR__)).'/Rundiz/Number/NumberThai.php';

require __DIR__ . '/_convert-numbers-set-test.php';

echo '<meta charset="utf-8">' . PHP_EOL;

$numthai = new \Rundiz\Number\NumberThai();
foreach ($numbers as $num) {
	echo $num . ' (' . gettype($num) . ') = '.$numthai->convertBaht($num);
	echo '<br>';
}

echo '<h3>Do not display net (ถ้วน)</h3>';
foreach ($numbers as $num) {
	echo $num . ' (' . gettype($num) . ') = '.$numthai->convertBaht($num, false);
	echo '<br>';
}
echo '<br>';
