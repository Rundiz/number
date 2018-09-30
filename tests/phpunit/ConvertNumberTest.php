<?php


namespace Rundiz\Number\Tests;

class ConvertNumberTest extends \PHPUnit\Framework\TestCase
{


    protected $numbersEng = array(
        array(
            'number' => -9210000000,
            'resultEng' => 'negative nine billion, two hundred and ten million',
            'resultThai' => 'ลบเก้าพันสองร้อยสิบล้าน'
        ),
        array(
            'number' => '-1000000',
            'resultEng' => 'negative one million',
            'resultThai' => 'ลบหนึ่งล้าน'
        ),
        array(
            'number' => '-100000',
            'resultEng' => 'negative one hundred thousand',
            'resultThai' => 'ลบหนึ่งแสน'
        ),
        array(
            'number' => '-10000',
            'resultEng' => 'negative ten thousand',
            'resultThai' => 'ลบหนึ่งหมื่น'
        ),
        array(
            'number' => -12,
            'resultEng' => 'negative twelve',
            'resultThai' => 'ลบสิบสอง'
        ),
        array(
            'number' => '-0.1234',
            'resultEng' => 'negative zero point one two three four',
            'resultThai' => 'ลบศูนย์จุดหนึ่งพันสองร้อยสามสิบสี่'
        ),
        array(
            'number' => '+5.45',
            'resultEng' => 'positive five point four five',
            'resultThai' => 'บวกห้าจุดสี่สิบห้า'
        ),
        array(
            'number' => 0,
            'resultEng' => 'zero',
            'resultThai' => 'ศูนย์'
        ),
        array(
            'number' => 0.123456789,
            'resultEng' => 'zero point one two three four five six seven eight nine',
            'resultThai' => 'ศูนย์จุดหนึ่งร้อยยี่สิบสามล้านสี่แสนห้าหมื่นหกพันเจ็ดร้อยแปดสิบเก้า'
        ),
        array(
            'number' => 0.05,
            'resultEng' => 'zero point zero five',
            'resultThai' => 'ศูนย์จุดศูนย์ห้า'
        ),
        array(
            'number' => 0.2,
            'resultEng' => 'zero point two',
            'resultThai' => 'ศูนย์จุดสอง'
        ),
        array(
            'number' => '0.20',
            'resultEng' => 'zero point two zero',
            'resultThai' => 'ศูนย์จุดยี่สิบ'
        ),
        array(
            'number' => 0.23,
            'resultEng' => 'zero point two three',
            'resultThai' => 'ศูนย์จุดยี่สิบสาม'
        ),
        array(
            'number' => 0.202,
            'resultEng' => 'zero point two zero two',
            'resultThai' => 'ศูนย์จุดสองร้อยสอง'
        ),
        array(
            'number' => 0.99,
            'resultEng' => 'zero point nine nine',
            'resultThai' => 'ศูนย์จุดเก้าสิบเก้า'
        ),
        array(
            'number' => 0.2102,
            'resultEng' => 'zero point two one zero two',
            'resultThai' => 'ศูนย์จุดสองพันหนึ่งร้อยสอง'
        ),
        array(
            'number' => '0212',
            'resultEng' => 'two hundred and twelve',
            'resultThai' => 'สองร้อยสิบสอง'
        ),
        array(
            'number' => '00213',
            'resultEng' => 'two hundred and thirteen',
            'resultThai' => 'สองร้อยสิบสาม'
        ),
        array(
            'number' => '1.00',
            'resultEng' => 'one',
            'resultThai' => 'หนึ่ง'
        ),
        array(
            'number' => 324.5,
            'resultEng' => 'three hundred and twenty-four point five',
            'resultThai' => 'สามร้อยยี่สิบสี่จุดห้า'
        ),
        array(
            'number' => '324.50',
            'resultEng' => 'three hundred and twenty-four point five zero',
            'resultThai' => 'สามร้อยยี่สิบสี่จุดห้าสิบ'
        ),
        array(
            'number' => 1,
            'resultEng' => 'one',
            'resultThai' => 'หนึ่ง'
        ),
        array(
            'number' => 5,
            'resultEng' => 'five',
            'resultThai' => 'ห้า'
        ),
        array(
            'number' => 10,
            'resultEng' => 'ten',
            'resultThai' => 'สิบ'
        ),
        array(
            'number' => 11,
            'resultEng' => 'eleven',
            'resultThai' => 'สิบเอ็ด'
        ),
        array(
            'number' => 12,
            'resultEng' => 'twelve',
            'resultThai' => 'สิบสอง'
        ),
        array(
            'number' => 13,
            'resultEng' => 'thirteen',
            'resultThai' => 'สิบสาม'
        ),
        array(
            'number' => 20,
            'resultEng' => 'twenty',
            'resultThai' => 'ยี่สิบ'
        ),
        array(
            'number' => 21,
            'resultEng' => 'twenty-one',
            'resultThai' => 'ยี่สิบเอ็ด'
        ),
        array(
            'number' => 30,
            'resultEng' => 'thirty',
            'resultThai' => 'สามสิบ'
        ),
        array(
            'number' => 33,
            'resultEng' => 'thirty-three',
            'resultThai' => 'สามสิบสาม'
        ),
        array(
            'number' => 100,
            'resultEng' => 'one hundred',
            'resultThai' => 'หนึ่งร้อย'
        ),
        array(
            'number' => 101,
            'resultEng' => 'one hundred and one',
            'resultThai' => 'หนึ่งร้อยเอ็ด'
        ),
        array(
            'number' => 1000,
            'resultEng' => 'one thousand',
            'resultThai' => 'หนึ่งพัน'
        ),
        array(
            'number' => 1001,
            'resultEng' => 'one thousand and one',
            'resultThai' => 'หนึ่งพันเอ็ด'
        ),
        array(
            'number' => 1010,
            'resultEng' => 'one thousand and ten',
            'resultThai' => 'หนึ่งพันสิบ'
        ),
        array(
            'number' => 1011,
            'resultEng' => 'one thousand and eleven',
            'resultThai' => 'หนึ่งพันสิบเอ็ด'
        ),
        array(
            'number' => 1012,
            'resultEng' => 'one thousand and twelve',
            'resultThai' => 'หนึ่งพันสิบสอง'
        ),
        array(
            'number' => 1013,
            'resultEng' => 'one thousand and thirteen',
            'resultThai' => 'หนึ่งพันสิบสาม'
        ),
        array(
            'number' => 1100,
            'resultEng' => 'one thousand, one hundred',
            'resultThai' => 'หนึ่งพันหนึ่งร้อย'
        ),
        array(
            'number' => 10000,
            'resultEng' => 'ten thousand',
            'resultThai' => 'หนึ่งหมื่น'
        ),
        array(
            'number' => 10001,
            'resultEng' => 'ten thousand and one',
            'resultThai' => 'หนึ่งหมื่นเอ็ด'
        ),
        array(
            'number' => 10010,
            'resultEng' => 'ten thousand and ten',
            'resultThai' => 'หนึ่งหมื่นสิบ'
        ),
        array(
            'number' => 10011,
            'resultEng' => 'ten thousand and eleven',
            'resultThai' => 'หนึ่งหมื่นสิบเอ็ด'
        ),
        array(
            'number' => 12000,
            'resultEng' => 'twelve thousand',
            'resultThai' => 'หนึ่งหมื่นสองพัน'
        ),
        array(
            'number' => 100000,
            'resultEng' => 'one hundred thousand',
            'resultThai' => 'หนึ่งแสน'
        ),
        array(
            'number' => 100001,
            'resultEng' => 'one hundred thousand and one',
            'resultThai' => 'หนึ่งแสนเอ็ด'
        ),
        array(
            'number' => 100010,
            'resultEng' => 'one hundred thousand and ten',
            'resultThai' => 'หนึ่งแสนสิบ'
        ),
        array(
            'number' => 100011,
            'resultEng' => 'one hundred thousand and eleven',
            'resultThai' => 'หนึ่งแสนสิบเอ็ด'
        ),
        array(
            'number' => 100012,
            'resultEng' => 'one hundred thousand and twelve',
            'resultThai' => 'หนึ่งแสนสิบสอง'
        ),
        array(
            'number' => 100013,
            'resultEng' => 'one hundred thousand and thirteen',
            'resultThai' => 'หนึ่งแสนสิบสาม'
        ),
        array(
            'number' => 111111,
            'resultEng' => 'one hundred and eleven thousand, one hundred and eleven',
            'resultThai' => 'หนึ่งแสนหนึ่งหมื่นหนึ่งพันหนึ่งร้อยสิบเอ็ด'
        ),
        array(
            'number' => 1234567,
            'resultEng' => 'one million, two hundred and thirty-four thousand, five hundred and sixty-seven',
            'resultThai' => 'หนึ่งล้านสองแสนสามหมื่นสี่พันห้าร้อยหกสิบเจ็ด'
        ),
        array(
            'number' => 87654321,
            'resultEng' => 'eighty-seven million, six hundred and fifty-four thousand, three hundred and twenty-one',
            'resultThai' => 'แปดสิบเจ็ดล้านหกแสนห้าหมื่นสี่พันสามร้อยยี่สิบเอ็ด'
        ),
        array(
            'number' => 987654321,
            'resultEng' => 'nine hundred and eighty-seven million, six hundred and fifty-four thousand, three hundred and twenty-one',
            'resultThai' => 'เก้าร้อยแปดสิบเจ็ดล้านหกแสนห้าหมื่นสี่พันสามร้อยยี่สิบเอ็ด'
        ),
        array(
            'number' => 1987654321,
            'resultEng' => 'one billion, nine hundred and eighty-seven million, six hundred and fifty-four thousand, three hundred and twenty-one',
            'resultThai' => 'หนึ่งพันเก้าร้อยแปดสิบเจ็ดล้านหกแสนห้าหมื่นสี่พันสามร้อยยี่สิบเอ็ด'
        ),
        array(
            'number' => '12345678912',
            'resultEng' => 'twelve billion, three hundred and forty-five million, six hundred and seventy-eight thousand, nine hundred and twelve',
            'resultThai' => 'หนึ่งหมื่นสองพันสามร้อยสี่สิบห้าล้านหกแสนเจ็ดหมื่นแปดพันเก้าร้อยสิบสอง'
        ),
        array(
            'number' => '123456789123',
            'resultEng' => 'one hundred and twenty-three billion, four hundred and fifty-six million, seven hundred and eighty-nine thousand, one hundred and twenty-three',
            'resultThai' => 'หนึ่งแสนสองหมื่นสามพันสี่ร้อยห้าสิบหกล้านเจ็ดแสนแปดหมื่นเก้าพันหนึ่งร้อยยี่สิบสาม'
        ),
        array(
            'number' => '5554321987321',
            'resultEng' => 'five trillion, five hundred and fifty-four billion, three hundred and twenty-one million, nine hundred and eighty-seven thousand, three hundred and twenty-one',
            'resultThai' => 'ห้าล้านห้าแสนห้าหมื่นสี่พันสามร้อยยี่สิบเอ็ดล้านเก้าแสนแปดหมื่นเจ็ดพันสามร้อยยี่สิบเอ็ด'
        ),
        array(
            'number' => '100000000000000',
            'resultEng' => 'one hundred trillion',
            'resultThai' => 'หนึ่งร้อยล้านล้าน'
        ),
        array(
            'number' => '100000000000000000000',
            'resultEng' => 'one hundred quintrillion',
            'resultThai' => 'หนึ่งร้อยล้านล้านล้าน'
        ),
        array(
            'number' => '10000000000000000000000000',
            'resultEng' => 'ten septillion',
            'resultThai' => 'สิบล้านล้านล้านล้าน'
        ),
        array(
            'number' => '100000000000000000000000000',
            'resultEng' => 'one hundred septillion',
            'resultThai' => 'หนึ่งร้อยล้านล้านล้านล้าน'
        ),
        array(
            'number' => '1000000000000000000000000000',
            'resultEng' => 'one octillion',
            'resultThai' => 'หนึ่งพันล้านล้านล้านล้าน'
        ),
        array(
            'number' => '10000000000000000000000000000',
            'resultEng' => 'ten octillion',
            'resultThai' => 'หนึ่งหมื่นล้านล้านล้านล้าน'
        ),
        array(
            'number' => '100000000000000000000000000000',
            'resultEng' => 'one hundred octillion',
            'resultThai' => 'หนึ่งแสนล้านล้านล้านล้าน'
        ),
        array(
            'number' => '1000000000000000000000000000000',
            'resultEng' => 'one nonillion',
            'resultThai' => 'หนึ่งล้านล้านล้านล้านล้าน'
        ),
        array(
            'number' => '1000000000000000000000000000000000',
            'resultEng' => 'one decillion',
            'resultThai' => 'หนึ่งพันล้านล้านล้านล้านล้าน'
        ),
        array(
            'number' => '10000000000000000000000000000000000',
            'resultEng' => 'ten decillion',
            'resultThai' => 'หนึ่งหมื่นล้านล้านล้านล้านล้าน'
        ),
        array(
            'number' => '100000000000000000000000000000000000',
            'resultEng' => 'one hundred decillion',
            'resultThai' => 'หนึ่งแสนล้านล้านล้านล้านล้าน'
        ),
        array(
            'number' => '1000000000000000000000000000000000000',
            'resultEng' => 'Error!',
            'resultThai' => 'หนึ่งล้านล้านล้านล้านล้านล้าน'
        )
    );


    public function testEngResult()
    {
        $Number = new \Rundiz\Number\Number();
        foreach ($this->numbersEng as $item) {
            $this->assertEquals($item['resultEng'], $Number->convertNumber($item['number'], 'Eng'));
        }
    }// testEngResult


    public function testThaiResult()
    {
        $Number = new \Rundiz\Number\Number();
        foreach ($this->numbersEng as $item) {
            $this->assertEquals($item['resultThai'], $Number->convertNumber($item['number'], 'Thai'));
        }
    }// testThaiResult


}