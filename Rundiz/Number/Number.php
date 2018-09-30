<?php
/**
 * Number class.
 *
 * @package Number
 * @version 1.1.6
 * @author Vee W.
 * @license http://opensource.org/licenses/MIT
 *
 */

namespace Rundiz\Number;

/**
 * number class for convert number, convert file size from bytes to other or from other to bytes.
 *
 * @since 1.1
 */
class Number
{


    /**
     * byte units.
     *
     * @var array match the byte units (B, KB, KiB, ...) to conversion number.
     * @link https://en.wikipedia.org/wiki/File_size reference for conversion number.
     */
    protected $byte_units = array(
        'B' => 1,
        'KiB' => 1024,
        'KB' => 1000,
        'MiB' => 1048576,
        'MB' => 1000000,
        'GiB' => 1073741824,
        'GB' => 1000000000,
        'TiB' => 1099511627776,
        'TB' => 1000000000000,
        'PiB' => 1125899906842624,
        'PB' => 1000000000000000,
        'EiB' => 1152921504606846976,
        'EB' => 1000000000000000000,
        'ZiB' => 1180591620717411303424,
        'ZB' => 1000000000000000000000,
        'YiB' => 1208925819614629174706176,
        'YB' => 1000000000000000000000000,
    );


    /**
     * A shorter way to convert Baht to different languages in one class. You no need to initialize `new Number[Language]()` class just `new Number()`.<br>
     * You may need to require/include the Number[Language].php file if you don't use composer.
     *
     * @param number $num number integer or decimal. negative or positive.
     * @param boolean $display_net display net (ถ้วน). true to display, false to not display. Usually this is only works with Thai language.
     * @param string $language the language you want to use. accepted Thai, Eng. this will be use in new Number[Language] object automatically.
     */
    public function convertBaht($num, $display_net = true, $language = 'Thai')
    {
        $number_lang_class_name = 'Rundiz\\Number\\Number'.$language;

        if (class_exists($number_lang_class_name)) {
            $numlang = new $number_lang_class_name();

            if (method_exists($numlang, 'convertBaht')) {
                $output = $numlang->convertBaht($num, $display_net);
            } else {
                $output = $numlang->convertNumber($num);
                if ($language == 'Eng') {
                    $output .= ' Baht';
                }
            }

            unset($number_lang_class_name, $numlang);
            return $output;
        }

        unset($number_lang_class_name);
    }// convertBaht


    /**
     * A shorter way to convert number to different languages in one class. You no need to initialize `new Number[Language]()` class just `new Number()`.<br>
     * You may need to require/include the Number[Language].php file if you don't use composer.
     *
     * @param number $num number integer or decimal. negative or positive.
     * @param string $language the language you want to use. accepted Thai, Eng. this will be use in new Number[Language] object automatically.
     */
    public function convertNumber($num, $language = 'Thai')
    {
        $number_lang_class_name = 'Rundiz\\Number\\Number'.$language;

        if (class_exists($number_lang_class_name)) {
            $numlang = new $number_lang_class_name();
            $output = $numlang->convertNumber($num);
            unset($number_lang_class_name, $numlang);
            return $output;
        }

        unset($number_lang_class_name);
    }// convertNumber


    /**
     * convert file size from bytes to the unit you specified or automatically detect.
     *
     * @param integer $size file size in bytes only.
     * @param string $unit unit you want to convert. accepted values are AUTO, B, KB, KiB, ... more please refer to byte_units property.
     * @param integer $decimal number of decimal.
     * @return mixed return converted file size as string if success, return false if failed to convert.
     */
    public function fromBytes($size, $unit = 'AUTO', $decimal = 2)
    {
        if (!is_numeric($size)) {
            return false;
        }
        $size = (string) $size;

        if ($unit == null) {
            $unit = 'AUTO';
        }

        $decimal = intval($decimal);
        $output = false;

        if ($unit != 'AUTO') {
            if (array_key_exists($unit, $this->byte_units)) {
                $size_unit_conversion = (string) $this->byte_units[$unit];
            } else {
                $unit = 'B';
                $size_unit_conversion = (string) 1;
            }

            $output = bcdiv($size, $size_unit_conversion, $decimal).' '.$unit;
        } else {
            $byte_units = array_reverse($this->byte_units);
            foreach ($byte_units as $size_unit => $size_unit_conversion) {
                $size_unit_conversion = (string) $size_unit_conversion;
                if ($size >= $size_unit_conversion && $unit == 'AUTO') {
                    $output = bcdiv($size, $size_unit_conversion, $decimal).' '.$size_unit;
                    break;
                }
            }
        }

        unset($byte_units, $size_unit, $size_unit_conversion);
        return $output;
    }// fromBytes


    /**
     * Remove dot zero digits.
     *
     * @since 1.1.5
     * @param string|float|double $number The original number.
     * @param boolean $all_zero If you just want to remove all dot zero (example: 12.0000 = 12) then set this to true. If you want to remove any trailing dot zero (example: 12.1250 = 12.125) then set this to false.
     * @param string $decimal_point Decimal point. You can change this for example: european use , as decimal point.
     * @return string Return number that is removed dot zero digits.
     */
    function removeDotZero($number, $all_zero = true, $decimal_point = '.')
    {
        if (strpos($number, $decimal_point) !== false) {
            if ($all_zero === true) {
                $numberExplode = explode($decimal_point, $number);
                if (is_array($numberExplode) && array_key_exists(1, $numberExplode) && array_key_exists(0, $numberExplode)) {
                    if (floatval($numberExplode[1]) == floatval(0) && ctype_digit($numberExplode[1])) {
                        $number = $numberExplode[0];
                    }
                }
                unset($numberExplode);
            } else {
                $number = rtrim($number, '0');
                $number = rtrim($number, $decimal_point);
            }
        }

        return (string) $number;
    }// removeDotZero


    /**
     * convert file size to bytes.
     *
     * @param string $size enter file size string such as 105 or 105B for 105 Bytes, 1KB for 1 Kilobyte, 1KiB for 1 Kibibyte. file size unit can be *B or *iB for binary and decimal.
     * @return mixed return false if failed to convert. return number if it is able to convert.
     */
    public function toBytes($size)
    {
        $pattern = '/^([0-9]+(?:\.[0-9]+)?)('.implode('|', array_keys($this->byte_units)).')?$/Di';

        if (!preg_match($pattern, trim($size), $matches)) {
            // unable to convert to byte because input size does not match pattern. (xxxB, xxxKB, xxxKiB, ...)
            return false;
        }
        unset($pattern);

        if (!isset($matches[2]) && isset($matches[1]) && strpos($matches[1], '.') !== false) {
            // if no size unit and the number is float, double, contain dot. cannot convert.
            return false;
        }

        $size_number = 0;
        if (isset($matches[1])) {
            $size_number = $matches[1];
        } else {
            return false;
        }

        $size_unit = 'B';
        if (isset($matches[2])) {
            $size_unit = $matches[2];
        }

        $size_unit_conversion = 1;
        if (array_key_exists($size_unit, $this->byte_units)) {
            $size_unit_conversion = $this->byte_units[$size_unit];
        }
        unset($size_unit);

        $bytes = $size_number*$size_unit_conversion;
        unset($size_number, $size_unit_conversion);
        return $bytes;
    }// toBytes


}
