<?php


namespace Rundiz\Number\Tests;

class NumberTest extends \PHPUnit\Framework\TestCase
{


    public function testConvertByte()
    {
        $Number = new \Rundiz\Number\Number();
        $this->assertEquals('10000.00 B', $Number->fromBytes(10000, 'INVALIDUNIT'));
        $this->assertEquals('20.00 TB', $Number->fromBytes(20000000000001));
        $this->assertEquals('123.45 GB', $Number->fromBytes(123456789123));
        $this->assertEquals('100.00 GB', $Number->fromBytes(100000000000));
        $this->assertEquals('10.00 MB', $Number->fromBytes(10000000));
        $this->assertEquals('100.00 KB', $Number->fromBytes(100000));
        $this->assertEquals('123.45 B', $Number->fromBytes(123.456789123));
        $this->assertFalse($Number->fromBytes(-123.456789123));

        $this->assertEquals('8796093022208', $Number->toBytes('8TiB'));
        $this->assertEquals('8796093022208', $Number->toBytes('8.000TiB'));
        $this->assertEquals('8020000000000', $Number->toBytes('8.02TB'));
        $this->assertEquals('1342177280', $Number->toBytes('1.25GiB'));
        $this->assertEquals('132560717806.04314', $Number->toBytes('123.456789GiB'));
        $this->assertEquals('123456789000', $Number->toBytes('123.456789GB'));
        $this->assertEquals('10171187.2', $Number->toBytes('9.7MiB'));
        $this->assertEquals('9700000', $Number->toBytes('9.7MB'));
        $this->assertEquals('1331.2', $Number->toBytes('1.3KiB'));
        $this->assertEquals('1331.2', $Number->toBytes('1.30KiB'));
        $this->assertEquals('98765', $Number->toBytes('98.765KB'));
        $this->assertEquals('98765.43', $Number->toBytes('98.76543KB'));
        $this->assertEquals('6960', $Number->toBytes('6960B'));
        $this->assertEquals('1245', $Number->toBytes('1245'));
        $this->assertEquals('2594', $Number->toBytes(2594));
        $this->assertFalse($Number->toBytes(45.60));
        $this->assertEquals('101135.80032', $Number->toBytes('98.76543KiB'));// not contain space.
        $this->assertFalse($Number->toBytes('98.76543 KiB'));// contain space.
        $this->assertFalse($Number->toBytes('-123.456789GiB'));
    }// testConvertByte


    public function testConvertArabicNumber()
    {
        $NumberThai = new \Rundiz\Number\NumberThai();
        $this->assertEquals('๑๒๓๔๕๖๗๘๙๐', $NumberThai->arabicToThaiNumber('1234567890'));
        $this->assertEquals('9087654321', $NumberThai->thaiToArabicNumber('๙๐๘๗๖๕๔๓๒๑'));
    }// testConvertArabicNumber


    public function testRemoveDotZero()
    {
        $Number = new \Rundiz\Number\Number();
        // test remove only all dot zero (xx.0000 NOT xx.500).
        $this->assertSame('-100000', $Number->removeDotZero('-100000'));
        $this->assertSame('-10000', $Number->removeDotZero('-10000.00'));
        $this->assertSame('-12', $Number->removeDotZero(-12));
        $this->assertSame('-0.1234', $Number->removeDotZero('-0.1234'));
        $this->assertSame('0', $Number->removeDotZero(0));
        $this->assertSame('-0', $Number->removeDotZero('-0'));
        $this->assertSame('0.123456789', $Number->removeDotZero(0.123456789));
        $this->assertSame('0.05', $Number->removeDotZero(0.05));
        $this->assertSame('0.2', $Number->removeDotZero(0.2));
        $this->assertSame('0.202', $Number->removeDotZero(0.202));
        $this->assertSame('1', $Number->removeDotZero('1.00'));
        $this->assertSame('11', $Number->removeDotZero(floatval(11.00)));
        $this->assertSame('35.400', $Number->removeDotZero('35.400'));
        $this->assertSame('100.49', $Number->removeDotZero(100.49));
        $this->assertSame('1000.3520000000', $Number->removeDotZero('1000.3520000000'));
        $this->assertSame('1987', $Number->removeDotZero('1987.0000000000'));
        $this->assertSame('6.0000000000000E+15', $Number->removeDotZero('6.0000000000000E+15'));
        $this->assertSame('6.7553994410557E+15', $Number->removeDotZero('6.7553994410557E+15'));
        $this->assertSame('1337', $Number->removeDotZero(0x539));
        $this->assertSame('1337', $Number->removeDotZero(0b10100111001));

        // test remove any trailing dot zero (xx.0000 AND xx.500).
        $this->assertSame('-100000', $Number->removeDotZero('-100000', false));
        $this->assertSame('-10000', $Number->removeDotZero('-10000.00', false));
        $this->assertSame('-12', $Number->removeDotZero(-12, false));
        $this->assertSame('-0.1234', $Number->removeDotZero('-0.1234', false));
        $this->assertSame('0', $Number->removeDotZero(0, false));
        $this->assertSame('-0', $Number->removeDotZero('-0', false));
        $this->assertSame('0.123456789', $Number->removeDotZero(0.123456789, false));
        $this->assertSame('0.05', $Number->removeDotZero(0.05, false));
        $this->assertSame('0.2', $Number->removeDotZero(0.2, false));
        $this->assertSame('0.202', $Number->removeDotZero(0.202, false));
        $this->assertSame('1', $Number->removeDotZero('1.00', false));
        $this->assertSame('11', $Number->removeDotZero(floatval(11.00), false));
        $this->assertSame('35.4', $Number->removeDotZero('35.400', false));
        $this->assertSame('100.49', $Number->removeDotZero(100.49, false));
        $this->assertSame('1000.352', $Number->removeDotZero('1000.3520000000', false));
        $this->assertSame('1987', $Number->removeDotZero('1987.0000000000', false));
        $this->assertSame('6.0000000000000E+15', $Number->removeDotZero('6.0000000000000E+15', false));
        $this->assertSame('6.7553994410557E+15', $Number->removeDotZero('6.7553994410557E+15', false));
        $this->assertSame('1337', $Number->removeDotZero(0x539, false));
        $this->assertSame('1337', $Number->removeDotZero(0b10100111001, false));

        // test remove all dot zero for european number format (use , as decimal point).
        $this->assertSame('-100000', $Number->removeDotZero('-100000', true, ','));
        $this->assertSame('-10000', $Number->removeDotZero('-10000,00', true, ','));
        $this->assertSame('-12', $Number->removeDotZero(-12, true, ','));
        $this->assertSame('-0,1234', $Number->removeDotZero('-0,1234', true, ','));
        $this->assertSame('0', $Number->removeDotZero(0, true, ','));
        $this->assertSame('-0', $Number->removeDotZero('-0', true, ','));
        $this->assertSame('0,123456789', $Number->removeDotZero('0,123456789', true, ','));
        $this->assertSame('0,05', $Number->removeDotZero('0,05', true, ','));
        $this->assertSame('0,2', $Number->removeDotZero('0,2', true, ','));
        $this->assertSame('0,202', $Number->removeDotZero('0,202', true, ','));
        $this->assertSame('1', $Number->removeDotZero('1,00', true, ','));
        $this->assertSame('11', $Number->removeDotZero(floatval('11,00'), true, ','));
        $this->assertSame('35,400', $Number->removeDotZero('35,400', true, ','));
        $this->assertSame('100,49', $Number->removeDotZero('100,49', true, ','));
        $this->assertSame('1000,3520000000', $Number->removeDotZero('1000,3520000000', true, ','));
        $this->assertSame('1987', $Number->removeDotZero('1987,0000000000', true, ','));
        $this->assertSame('6,0000000000000E+15', $Number->removeDotZero('6,0000000000000E+15', true, ','));
        $this->assertSame('6,7553994410557E+15', $Number->removeDotZero('6,7553994410557E+15', true, ','));
        $this->assertSame('1337', $Number->removeDotZero(0x539, true, ','));
        $this->assertSame('1337', $Number->removeDotZero(0b10100111001, true, ','));

        // test remove trailing dot zero for european number format (use , as decimal point).
        $this->assertSame('-100000', $Number->removeDotZero('-100000', false, ','));
        $this->assertSame('-10000', $Number->removeDotZero('-10000,00', false, ','));
        $this->assertSame('-12', $Number->removeDotZero(-12, false, ','));
        $this->assertSame('-0,1234', $Number->removeDotZero('-0,1234', false, ','));
        $this->assertSame('0', $Number->removeDotZero(0, false, ','));
        $this->assertSame('-0', $Number->removeDotZero('-0', false, ','));
        $this->assertSame('0,123456789', $Number->removeDotZero('0,123456789', false, ','));
        $this->assertSame('0,05', $Number->removeDotZero('0,05', false, ','));
        $this->assertSame('0,2', $Number->removeDotZero('0,2', false, ','));
        $this->assertSame('0,202', $Number->removeDotZero('0,202', false, ','));
        $this->assertSame('1', $Number->removeDotZero('1,00', false, ','));
        $this->assertSame('11', $Number->removeDotZero(floatval('11,00'), false, ','));
        $this->assertSame('35,4', $Number->removeDotZero('35,400', false, ','));
        $this->assertSame('100,49', $Number->removeDotZero('100,49', false, ','));
        $this->assertSame('1000,352', $Number->removeDotZero('1000,3520000000', false, ','));
        $this->assertSame('1987', $Number->removeDotZero('1987,0000000000', false, ','));
        $this->assertSame('6,0000000000000E+15', $Number->removeDotZero('6,0000000000000E+15', false, ','));
        $this->assertSame('6,7553994410557E+15', $Number->removeDotZero('6,7553994410557E+15', false, ','));
        $this->assertSame('1337', $Number->removeDotZero(0x539, false, ','));
        $this->assertSame('1337', $Number->removeDotZero(0b10100111001, false, ','));
    }// testRemoveDotZero


}
