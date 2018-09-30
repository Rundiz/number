<?php


namespace Rundiz\Number\Tests;

class ConvertTHBTest extends \PHPUnit\Framework\TestCase
{


    protected $numbersEng = array(
        array(
            'number' => -9210000000,
            'resultEng' => 'negative nine billion, two hundred and ten million Baht',
            'resultThai' => 'ลบเก้าพันสองร้อยสิบล้านบาทถ้วน'
        ),
        array(
            'number' => '-1000000',
            'resultEng' => 'negative one million Baht',
            'resultThai' => 'ลบหนึ่งล้านบาทถ้วน'
        ),
        array(
            'number' => '-100000',
            'resultEng' => 'negative one hundred thousand Baht',
            'resultThai' => 'ลบหนึ่งแสนบาทถ้วน'
        ),
        array(
            'number' => '-10000',
            'resultEng' => 'negative ten thousand Baht',
            'resultThai' => 'ลบหนึ่งหมื่นบาทถ้วน'
        ),
        array(
            'number' => -12,
            'resultEng' => 'negative twelve Baht',
            'resultThai' => 'ลบสิบสองบาทถ้วน'
        ),
        array(
            'number' => '-0.1234',
            'resultEng' => 'negative zero point one two three four Baht',
            'resultThai' => 'ลบศูนย์บาทหนึ่งพันสองร้อยสามสิบสี่สตางค์'
        ),
        array(
            'number' => '+5.45',
            'resultEng' => 'positive five point four five Baht',
            'resultThai' => 'บวกห้าบาทสี่สิบห้าสตางค์'
        ),
        array(
            'number' => 0,
            'resultEng' => 'zero Baht',
            'resultThai' => 'ศูนย์บาทถ้วน'
        ),
        array(
            'number' => 0.123456789,
            'resultEng' => 'zero point one two three four five six seven eight nine Baht',
            'resultThai' => 'ศูนย์บาทหนึ่งร้อยยี่สิบสามล้านสี่แสนห้าหมื่นหกพันเจ็ดร้อยแปดสิบเก้าสตางค์'
        ),
        array(
            'number' => 0.05,
            'resultEng' => 'zero point zero five Baht',
            'resultThai' => 'ศูนย์บาทห้าสตางค์'
        ),
        array(
            'number' => 0.2,
            'resultEng' => 'zero point two Baht',
            'resultThai' => 'ศูนย์บาทยี่สิบสตางค์'
        ),
        array(
            'number' => '0.20',
            'resultEng' => 'zero point two zero Baht',
            'resultThai' => 'ศูนย์บาทยี่สิบสตางค์'
        ),
        array(
            'number' => 0.23,
            'resultEng' => 'zero point two three Baht',
            'resultThai' => 'ศูนย์บาทยี่สิบสามสตางค์'
        ),
        array(
            'number' => 0.202,
            'resultEng' => 'zero point two zero two Baht',
            'resultThai' => 'ศูนย์บาทสองร้อยสองสตางค์'
        ),
        array(
            'number' => 0.99,
            'resultEng' => 'zero point nine nine Baht',
            'resultThai' => 'ศูนย์บาทเก้าสิบเก้าสตางค์'
        ),
        array(
            'number' => 0.2102,
            'resultEng' => 'zero point two one zero two Baht',
            'resultThai' => 'ศูนย์บาทสองพันหนึ่งร้อยสองสตางค์'
        ),
        array(
            'number' => '0212',
            'resultEng' => 'two hundred and twelve Baht',
            'resultThai' => 'สองร้อยสิบสองบาทถ้วน'
        ),
        array(
            'number' => '00213',
            'resultEng' => 'two hundred and thirteen Baht',
            'resultThai' => 'สองร้อยสิบสามบาทถ้วน'
        ),
        array(
            'number' => '1.00',
            'resultEng' => 'one Baht',
            'resultThai' => 'หนึ่งบาทถ้วน'
        ),
        array(
            'number' => 324.5,
            'resultEng' => 'three hundred and twenty-four point five Baht',
            'resultThai' => 'สามร้อยยี่สิบสี่บาทห้าสิบสตางค์'
        ),
        array(
            'number' => '324.50',
            'resultEng' => 'three hundred and twenty-four point five zero Baht',
            'resultThai' => 'สามร้อยยี่สิบสี่บาทห้าสิบสตางค์'
        ),
        array(
            'number' => 1,
            'resultEng' => 'one Baht',
            'resultThai' => 'หนึ่งบาทถ้วน'
        ),
        array(
            'number' => 5,
            'resultEng' => 'five Baht',
            'resultThai' => 'ห้าบาทถ้วน'
        ),
        array(
            'number' => 10,
            'resultEng' => 'ten Baht',
            'resultThai' => 'สิบบาทถ้วน'
        ),
        array(
            'number' => 11,
            'resultEng' => 'eleven Baht',
            'resultThai' => 'สิบเอ็ดบาทถ้วน'
        ),
        array(
            'number' => 12,
            'resultEng' => 'twelve Baht',
            'resultThai' => 'สิบสองบาทถ้วน'
        ),
        array(
            'number' => 13,
            'resultEng' => 'thirteen Baht',
            'resultThai' => 'สิบสามบาทถ้วน'
        ),
        array(
            'number' => 20,
            'resultEng' => 'twenty Baht',
            'resultThai' => 'ยี่สิบบาทถ้วน'
        ),
        array(
            'number' => 21,
            'resultEng' => 'twenty-one Baht',
            'resultThai' => 'ยี่สิบเอ็ดบาทถ้วน'
        ),
        array(
            'number' => 30,
            'resultEng' => 'thirty Baht',
            'resultThai' => 'สามสิบบาทถ้วน'
        ),
        array(
            'number' => 33,
            'resultEng' => 'thirty-three Baht',
            'resultThai' => 'สามสิบสามบาทถ้วน'
        ),
        array(
            'number' => 100,
            'resultEng' => 'one hundred Baht',
            'resultThai' => 'หนึ่งร้อยบาทถ้วน'
        ),
        array(
            'number' => 101,
            'resultEng' => 'one hundred and one Baht',
            'resultThai' => 'หนึ่งร้อยเอ็ดบาทถ้วน'
        ),
        array(
            'number' => 1000,
            'resultEng' => 'one thousand Baht',
            'resultThai' => 'หนึ่งพันบาทถ้วน'
        ),
        array(
            'number' => 1001,
            'resultEng' => 'one thousand and one Baht',
            'resultThai' => 'หนึ่งพันเอ็ดบาทถ้วน'
        ),
        array(
            'number' => 1010,
            'resultEng' => 'one thousand and ten Baht',
            'resultThai' => 'หนึ่งพันสิบบาทถ้วน'
        ),
        array(
            'number' => 1011,
            'resultEng' => 'one thousand and eleven Baht',
            'resultThai' => 'หนึ่งพันสิบเอ็ดบาทถ้วน'
        ),
        array(
            'number' => 1012,
            'resultEng' => 'one thousand and twelve Baht',
            'resultThai' => 'หนึ่งพันสิบสองบาทถ้วน'
        ),
        array(
            'number' => 1013,
            'resultEng' => 'one thousand and thirteen Baht',
            'resultThai' => 'หนึ่งพันสิบสามบาทถ้วน'
        ),
        array(
            'number' => 1100,
            'resultEng' => 'one thousand, one hundred Baht',
            'resultThai' => 'หนึ่งพันหนึ่งร้อยบาทถ้วน'
        ),
        array(
            'number' => 10000,
            'resultEng' => 'ten thousand Baht',
            'resultThai' => 'หนึ่งหมื่นบาทถ้วน'
        ),
        array(
            'number' => 10001,
            'resultEng' => 'ten thousand and one Baht',
            'resultThai' => 'หนึ่งหมื่นเอ็ดบาทถ้วน'
        ),
        array(
            'number' => 10010,
            'resultEng' => 'ten thousand and ten Baht',
            'resultThai' => 'หนึ่งหมื่นสิบบาทถ้วน'
        ),
        array(
            'number' => 10011,
            'resultEng' => 'ten thousand and eleven Baht',
            'resultThai' => 'หนึ่งหมื่นสิบเอ็ดบาทถ้วน'
        ),
        array(
            'number' => 12000,
            'resultEng' => 'twelve thousand Baht',
            'resultThai' => 'หนึ่งหมื่นสองพันบาทถ้วน'
        ),
        array(
            'number' => 100000,
            'resultEng' => 'one hundred thousand Baht',
            'resultThai' => 'หนึ่งแสนบาทถ้วน'
        ),
        array(
            'number' => 100001,
            'resultEng' => 'one hundred thousand and one Baht',
            'resultThai' => 'หนึ่งแสนเอ็ดบาทถ้วน'
        ),
        array(
            'number' => 100010,
            'resultEng' => 'one hundred thousand and ten Baht',
            'resultThai' => 'หนึ่งแสนสิบบาทถ้วน'
        ),
        array(
            'number' => 100011,
            'resultEng' => 'one hundred thousand and eleven Baht',
            'resultThai' => 'หนึ่งแสนสิบเอ็ดบาทถ้วน'
        ),
        array(
            'number' => 100012,
            'resultEng' => 'one hundred thousand and twelve Baht',
            'resultThai' => 'หนึ่งแสนสิบสองบาทถ้วน'
        ),
        array(
            'number' => 100013,
            'resultEng' => 'one hundred thousand and thirteen Baht',
            'resultThai' => 'หนึ่งแสนสิบสามบาทถ้วน'
        ),
        array(
            'number' => 111111,
            'resultEng' => 'one hundred and eleven thousand, one hundred and eleven Baht',
            'resultThai' => 'หนึ่งแสนหนึ่งหมื่นหนึ่งพันหนึ่งร้อยสิบเอ็ดบาทถ้วน'
        ),
        array(
            'number' => 1234567,
            'resultEng' => 'one million, two hundred and thirty-four thousand, five hundred and sixty-seven Baht',
            'resultThai' => 'หนึ่งล้านสองแสนสามหมื่นสี่พันห้าร้อยหกสิบเจ็ดบาทถ้วน'
        ),
        array(
            'number' => 87654321,
            'resultEng' => 'eighty-seven million, six hundred and fifty-four thousand, three hundred and twenty-one Baht',
            'resultThai' => 'แปดสิบเจ็ดล้านหกแสนห้าหมื่นสี่พันสามร้อยยี่สิบเอ็ดบาทถ้วน'
        ),
        array(
            'number' => 987654321,
            'resultEng' => 'nine hundred and eighty-seven million, six hundred and fifty-four thousand, three hundred and twenty-one Baht',
            'resultThai' => 'เก้าร้อยแปดสิบเจ็ดล้านหกแสนห้าหมื่นสี่พันสามร้อยยี่สิบเอ็ดบาทถ้วน'
        ),
        array(
            'number' => 1987654321,
            'resultEng' => 'one billion, nine hundred and eighty-seven million, six hundred and fifty-four thousand, three hundred and twenty-one Baht',
            'resultThai' => 'หนึ่งพันเก้าร้อยแปดสิบเจ็ดล้านหกแสนห้าหมื่นสี่พันสามร้อยยี่สิบเอ็ดบาทถ้วน'
        ),
        array(
            'number' => '12345678912',
            'resultEng' => 'twelve billion, three hundred and forty-five million, six hundred and seventy-eight thousand, nine hundred and twelve Baht',
            'resultThai' => 'หนึ่งหมื่นสองพันสามร้อยสี่สิบห้าล้านหกแสนเจ็ดหมื่นแปดพันเก้าร้อยสิบสองบาทถ้วน'
        ),
        array(
            'number' => '123456789123',
            'resultEng' => 'one hundred and twenty-three billion, four hundred and fifty-six million, seven hundred and eighty-nine thousand, one hundred and twenty-three Baht',
            'resultThai' => 'หนึ่งแสนสองหมื่นสามพันสี่ร้อยห้าสิบหกล้านเจ็ดแสนแปดหมื่นเก้าพันหนึ่งร้อยยี่สิบสามบาทถ้วน'
        ),
        array(
            'number' => '5554321987321',
            'resultEng' => 'five trillion, five hundred and fifty-four billion, three hundred and twenty-one million, nine hundred and eighty-seven thousand, three hundred and twenty-one Baht',
            'resultThai' => 'ห้าล้านห้าแสนห้าหมื่นสี่พันสามร้อยยี่สิบเอ็ดล้านเก้าแสนแปดหมื่นเจ็ดพันสามร้อยยี่สิบเอ็ดบาทถ้วน'
        ),
        array(
            'number' => '100000000000000',
            'resultEng' => 'one hundred trillion Baht',
            'resultThai' => 'หนึ่งร้อยล้านล้านบาทถ้วน'
        ),
        array(
            'number' => '100000000000000000000',
            'resultEng' => 'one hundred quintrillion Baht',
            'resultThai' => 'หนึ่งร้อยล้านล้านล้านบาทถ้วน'
        ),
        array(
            'number' => '10000000000000000000000000',
            'resultEng' => 'ten septillion Baht',
            'resultThai' => 'สิบล้านล้านล้านล้านบาทถ้วน'
        ),
        array(
            'number' => '100000000000000000000000000',
            'resultEng' => 'one hundred septillion Baht',
            'resultThai' => 'หนึ่งร้อยล้านล้านล้านล้านบาทถ้วน'
        ),
        array(
            'number' => '1000000000000000000000000000',
            'resultEng' => 'one octillion Baht',
            'resultThai' => 'หนึ่งพันล้านล้านล้านล้านบาทถ้วน'
        ),
        array(
            'number' => '10000000000000000000000000000',
            'resultEng' => 'ten octillion Baht',
            'resultThai' => 'หนึ่งหมื่นล้านล้านล้านล้านบาทถ้วน'
        ),
        array(
            'number' => '100000000000000000000000000000',
            'resultEng' => 'one hundred octillion Baht',
            'resultThai' => 'หนึ่งแสนล้านล้านล้านล้านบาทถ้วน'
        ),
        array(
            'number' => '1000000000000000000000000000000',
            'resultEng' => 'one nonillion Baht',
            'resultThai' => 'หนึ่งล้านล้านล้านล้านล้านบาทถ้วน'
        ),
        array(
            'number' => '1000000000000000000000000000000000',
            'resultEng' => 'one decillion Baht',
            'resultThai' => 'หนึ่งพันล้านล้านล้านล้านล้านบาทถ้วน'
        ),
        array(
            'number' => '10000000000000000000000000000000000',
            'resultEng' => 'ten decillion Baht',
            'resultThai' => 'หนึ่งหมื่นล้านล้านล้านล้านล้านบาทถ้วน'
        ),
        array(
            'number' => '100000000000000000000000000000000000',
            'resultEng' => 'one hundred decillion Baht',
            'resultThai' => 'หนึ่งแสนล้านล้านล้านล้านล้านบาทถ้วน'
        ),
        array(
            'number' => '1000000000000000000000000000000000000',
            'resultEng' => 'Error! Baht',
            'resultThai' => 'หนึ่งล้านล้านล้านล้านล้านล้านบาทถ้วน'
        )
    );


    public function testEngResult()
    {
        $Number = new \Rundiz\Number\Number();
        foreach ($this->numbersEng as $item) {
            $this->assertEquals($item['resultEng'], $Number->convertBaht($item['number'], true, 'Eng'));
        }
    }// testEngResult


    public function testThaiResult()
    {
        $Number = new \Rundiz\Number\Number();
        foreach ($this->numbersEng as $item) {
            $this->assertEquals($item['resultThai'], $Number->convertBaht($item['number'], true, 'Thai'));
        }

        // test donot display net.
        $this->assertEquals('ศูนย์บาท', $Number->convertBaht(0, false, 'Thai'));
        $this->assertEquals('ห้าบาท', $Number->convertBaht(5, false, 'Thai'));
        $this->assertEquals('ห้าบาท', $Number->convertBaht('5', false, 'Thai'));
        $this->assertEquals('หนึ่งร้อยเอ็ดบาท', $Number->convertBaht(101, false, 'Thai'));
        $this->assertEquals('หนึ่งแสนบาท', $Number->convertBaht(100000, false, 'Thai'));
        $this->assertEquals('หนึ่งแสนเอ็ดบาท', $Number->convertBaht(100001, false, 'Thai'));
        $this->assertEquals('หนึ่งแสนสิบบาท', $Number->convertBaht(100010, false, 'Thai'));
        $this->assertEquals('หนึ่งล้านบาท', $Number->convertBaht(1000000, false, 'Thai'));
        $this->assertEquals('สิบล้านบาท', $Number->convertBaht(10000000, false, 'Thai'));
        $this->assertEquals('หนึ่งร้อยล้านบาท', $Number->convertBaht(100000000, false, 'Thai'));
        $this->assertEquals('หนึ่งพันล้านบาท', $Number->convertBaht(1000000000, false, 'Thai'));
        $this->assertEquals('หนึ่งหมื่นล้านบาท', $Number->convertBaht('10000000000', false, 'Thai'));
        $this->assertEquals('หนึ่งแสนล้านบาท', $Number->convertBaht('100000000000', false, 'Thai'));
        $this->assertEquals('หนึ่งล้านล้านบาท', $Number->convertBaht('1000000000000', false, 'Thai'));
        $this->assertEquals('สิบล้านล้านบาท', $Number->convertBaht('10000000000000', false, 'Thai'));
        $this->assertEquals('หนึ่งพันล้านล้านบาท', $Number->convertBaht('1000000000000000', false, 'Thai'));
        $this->assertEquals('หนึ่งหมื่นล้านล้านบาท', $Number->convertBaht('10000000000000000', false, 'Thai'));
        $this->assertEquals('หนึ่งร้อยล้านล้านบาท', $Number->convertBaht('100000000000000', false, 'Thai'));
        $this->assertEquals('หนึ่งหมื่นล้านล้านล้านล้านล้านบาท', $Number->convertBaht('10000000000000000000000000000000000', false, 'Thai'));
    }// testThaiResult


}