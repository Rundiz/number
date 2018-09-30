<?php


namespace Test\Shorter;

require dirname(dirname(__DIR__)).'/Rundiz/Number/NumberThai.php';
require dirname(dirname(__DIR__)).'/Rundiz/Number/NumberEng.php';
require dirname(dirname(__DIR__)).'/Rundiz/Number/Number.php';


$numbers = array(
    -43213895, '-1000000', '-0.12345',
    0.987523, 0.05, 0.99, 0.2102, 0.0203,
    '0212', '00213',
    1.02, 1.2, 1.20, '1.20', 1.202,
    '1.00', '21', 31, 1001, 100001, 324.50,
    '1000000000000000',
);


class Shorter
{


    public function run()
    {
        $number_obj = new \Rundiz\Number\Number();

        echo '<strong>English convertNumber</strong><br>';
        foreach ($GLOBALS['numbers'] as $num) {
            echo $num.' = '.$number_obj->convertNumber($num, 'Eng');
            echo '<br>';
        }
        echo '<br>';
        echo '<strong>Thai convertNumber</strong><br>';
        foreach ($GLOBALS['numbers'] as $num) {
            echo $num.' = '.$number_obj->convertNumber($num);
            echo '<br>';
        }
        echo '<br>';

        echo '<strong>English convertBaht</strong><br>';
        foreach ($GLOBALS['numbers'] as $num) {
            echo $num.' = '.$number_obj->convertBaht($num, true, 'Eng');
            echo '<br>';
        }
        echo '<br>';
        echo '<strong>Thai convertBaht</strong><br>';
        foreach ($GLOBALS['numbers'] as $num) {
            echo $num.' = '.$number_obj->convertBaht($num, true);
            echo '<br>';
        }
        echo '<br>';
    }// run


}


echo '<meta charset="utf-8">' . PHP_EOL;
// use namespace for test namespace in \Rundiz\Number\Number();
$test = new \Test\Shorter\Shorter();
$test->run();
