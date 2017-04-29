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
        $this->assertEquals('8020000000000', $Number->toBytes('8.02TB'));
    }// testConvertByte


    public function testConvertArabicNumber()
    {
        $NumberThai = new \Rundiz\Number\NumberThai();
        $this->assertEquals('๑๔๗', $NumberThai->arabicToThaiNumber('147'));
        $this->assertEquals('147', $NumberThai->thaiToArabicNumber('๑๔๗'));
    }// testConvertArabicNumber


}
