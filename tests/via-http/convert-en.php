<?php

require dirname(dirname(__DIR__)).'/Rundiz/Number/NumberEng.php';

require __DIR__ . '/_convert-numbers-set-test.php';

$numeng = new \Rundiz\Number\NumberEng();
foreach ($numbers as $num) {
    echo $num.' = '.$numeng->convertNumber($num);
    echo '<br>';
}


