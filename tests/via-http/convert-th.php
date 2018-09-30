<?php

require dirname(dirname(__DIR__)).'/Rundiz/Number/NumberThai.php';

require __DIR__ . '/_convert-numbers-set-test.php';

echo '<meta charset="utf-8">' . PHP_EOL;

$numthai = new \Rundiz\Number\NumberThai();
foreach ($numbers as $num) {
	echo $num.' = '.$numthai->convertNumber($num);
	echo '<br>';
}
echo '<br>';
echo $numthai->arabicToThaiNumber('รอ 2 นาที 30 วินาที.').'<br>';
echo $numthai->thaiToArabicNumber('รอ ๓ นาที ๔๕ วินาที.').'<br>';