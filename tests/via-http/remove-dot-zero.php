<?php

require dirname(dirname(__DIR__)).'/Rundiz/Number/Number.php';

$numbers = array(
	'-100000', '-10000.00', -12, '-0.1234',
	0, '-0',
	0.123456789, 0.05, 0.2, 0.23, 0.202, 0.99,
	'1.00',
	10, floatval(11.00), '20.00', 21.55, '35.400',
	100.49, '1000.3520000000', '1987.0000000000',
    '6.0000000000000E+15',
    '6.7553994410557E+15',
    0x539,// 1337
    0b10100111001,// 1337
);

$Number = new \Rundiz\Number\Number();
echo '<strong>Remove only dot zero</strong><br>';
foreach ($numbers as $num) {
	echo $num . ' (' . gettype($num) . ') = '.$Number->removeDotZero($num);
	echo '<br>';
}
echo '<br>';

echo '<strong>Remove trailing dot zero</strong><br>';
foreach ($numbers as $num) {
	echo $num . ' (' . gettype($num) . ') = '.$Number->removeDotZero($num, false);
	echo '<br>';
}
echo '<br>';

$numbers = array(
	'-100000', '-10000,00', -12, '-0,1234',
	0,
	'0,123456789', '0,05', '0,2', '0,23', '0,202', '0,99',
	'1,00',
	10, floatval('11,00'), '20,00', '21,55', '35,400',
	'100,49', '1000,3520000000', '1987,0000000000',
    '6,0000000000000E+15',
    '6,7553994410557E+15',
    0x539,// 1337
    0b10100111001,// 1337
);
echo '<strong>Remove only dot zero for european number format</strong><br>';
foreach ($numbers as $num) {
	echo $num . ' (' . gettype($num) . ') = '.$Number->removeDotZero($num, true, ',');
	echo '<br>';
}
echo '<br>';
