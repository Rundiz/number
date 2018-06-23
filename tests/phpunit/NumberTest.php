<?php


namespace Rundiz\Number\Tests;

class NumberTest extends \PHPUnit\Framework\TestCase
{


    public function testConvertBaht()
    {
        $Number = new \Rundiz\Number\Number();
        $this->assertEquals('negative forty-three million, two hundred and thirteen thousand, eight hundred and ninety-five Baht', $Number->convertBaht(-43213895, true, 'Eng'));
        $this->assertEquals('ลบสี่สิบสามล้านสองแสนหนึ่งหมื่นสามพันแปดร้อยเก้าสิบห้าบาทถ้วน', $Number->convertBaht(-43213895, true, 'Thai'));
    }// testConvertBaht


    public function testConvertNumber()
    {
        $Number = new \Rundiz\Number\Number();
        $this->assertEquals('three hundred and twenty-four point five', $Number->convertNumber(324.50, 'Eng'));
        $this->assertEquals('สามร้อยยี่สิบสี่จุดห้า', $Number->convertNumber(324.50, 'Thai'));
    }// testConvertNumber


    public function testConvertByte()
    {
        $Number = new \Rundiz\Number\Number();
        $this->assertEquals('100.00 GB', $Number->fromBytes(100000000000));
        $this->assertEquals('123.45 GB', $Number->fromBytes(123456789123));
        $this->assertEquals('123.45 B', $Number->fromBytes(123.456789123));
        $this->assertFalse($Number->fromBytes(-123.456789123));

        $this->assertEquals('8020000000000', $Number->toBytes('8.02TB'));
        $this->assertEquals('123456789000', $Number->toBytes('123.456789GB'));
        $this->assertEquals('98765', $Number->toBytes('98.765KB'));
        $this->assertEquals('98765.43', $Number->toBytes('98.76543KB'));
        $this->assertEquals('101135.80032', $Number->toBytes('98.76543KiB'));
        $this->assertEquals('132560717806.04314', $Number->toBytes('123.456789GiB'));
        $this->assertFalse($Number->toBytes('98.76543 KiB'));
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
