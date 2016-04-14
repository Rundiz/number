<?php
/**
 * Number English class.<br>
 * The convertNumber method was copy from Brenton Fletcher at http://bloople.net/num2text/cnumlib.txt<br>
 * I make it as a class and change the license to MIT that is still free to use and modify.
 *
 * @package Number
 * @since 1.0
 * @author Vee W.
 * @license http://opensource.org/licenses/MIT
 *
 */

namespace Rundiz\Number;

/**
 * convert number such as -10, 0.034, 0.50, 1.34, 1000000, or more to text in English language.
 * 
 * @author Brenton Fletcher.
 * @license MIT.
 * @link http://bloople.net/num2text author's home page.
 * @uses to convert number to text, make a call to from this class to convertNumber() method. Example: $number_eng->convertNumber('109.99');
 */
class NumberEng 
{


    /**
     * convert digit.
     * 
     * @param integer $digit
     * @return string
     */
    private function convertDigit($digit)
    {
       switch($digit)
       {
          case '0': return 'zero';
          case '1': return 'one';
          case '2': return 'two';
          case '3': return 'three';
          case '4': return 'four';
          case '5': return 'five';
          case '6': return 'six';
          case '7': return 'seven';
          case '8': return 'eight';
          case '9': return 'nine';
       }
    }//convertDigit


    /**
     * convert group of number scale.
     * 
     * @param integer $index
     * @return string
     */
    private function convertGroup($index)
    {
        switch ($index) {
            case 11: return ' decillion';
            case 10: return ' nonillion';
            case 9: return ' octillion';
            case 8: return ' septillion';
            case 7: return ' sextillion';
            case 6: return ' quintrillion';
            case 5: return ' quadrillion';
            case 4: return ' trillion';
            case 3: return ' billion';
            case 2: return ' million';
            case 1: return ' thousand';
            case 0: return '';
        }
    }// convertGroup

    /**
     * convert the number (and with dot).
     * 
     * @param number $num number integer or decimal. negative or positive.
     * @return string translated number to text in Thai language.
     */
    public function convertNumber($num) 
    {
        $num = strval($num);

        if (strpos($num, '.') !== false) {
            list($num, $dec) = explode('.', $num);
        } else {
            $dec = 0;
        }

        $output = '';

        if ($num{0} == '-') {
            $output = 'negative ';
            $num = ltrim($num, '-');
        } else if ($num{0} == '+') {
            $output = 'positive ';
            $num = ltrim($num, '+');
        }

        if ($num{0} == '0') {
            $output .= 'zero';
        } else {
            if (strlen($num) > 36) {
                return 'Error!';
            }
            
            $num = str_pad($num, 36, '0', STR_PAD_LEFT);
            $group = rtrim(chunk_split($num, 3, ' '), ' ');
            $groups = explode(' ', $group);

            $groups2 = array();
            foreach ($groups as $g) {
                $groups2[] = $this->convertThreeDigit($g{0}, $g{1}, $g{2});
            }// endforeach;

            for ($z = 0; $z < count($groups2); $z++) {
                if ($groups2[$z] != '') {
                    $output .= $groups2[$z] . $this->convertGroup(11 - $z) . ($z < 11 && !array_search('', array_slice($groups2, $z + 1, -1)) && $groups2[11] != '' && $groups[11]{0} == '0' ? ' and ' : ', ');
                }
            }// endfor;

            $output = rtrim($output, ', ');
        }// endif;

        if ($dec > 0) {
            $output .= ' point';
            for ($i = 0; $i < strlen($dec); $i++) {
                $output .= ' ' . $this->convertDigit($dec{$i});
            }// endfor;
        }// endif;

        return $output;
    }// convertNumber


    /**
     * convert three digit.
     * 
     * @param integer $dig1
     * @param integer $dig2
     * @param integer $dig3
     * @return string
     */
    private function convertThreeDigit($dig1, $dig2, $dig3)
    {
        $output = '';

        if ($dig1 == '0' && $dig2 == '0' && $dig3 == '0') {
            return '';
        }

        if ($dig1 != '0') {
            $output .= $this->convertDigit($dig1) . ' hundred';
            if ($dig2 != '0' || $dig3 != '0') {
                $output .= ' and ';
            }
        }

        if ($dig2 != '0') {
            $output .= $this->convertTwoDigit($dig2, $dig3);
        } else if ($dig3 != '0') {
            $output .= $this->convertDigit($dig3);
        }

        return $output;
    }// convertThreeDigit


    /**
     * convert two digits
     * 
     * @param integer $dig1
     * @param integer $dig2
     * @return string
     */
    private function convertTwoDigit($dig1, $dig2)
    {
        if ($dig2 == '0') {
            switch ($dig1) {
                case '1': return 'ten';
                case '2': return 'twenty';
                case '3': return 'thirty';
                case '4': return 'forty';
                case '5': return 'fifty';
                case '6': return 'sixty';
                case '7': return 'seventy';
                case '8': return 'eighty';
                case '9': return 'ninety';
            }
        } else if ($dig1 == '1') {
            switch ($dig2) {
                case '1': return 'eleven';
                case '2': return 'twelve';
                case '3': return 'thirteen';
                case '4': return 'fourteen';
                case '5': return 'fifteen';
                case '6': return 'sixteen';
                case '7': return 'seventeen';
                case '8': return 'eighteen';
                case '9': return 'nineteen';
            }
        } else {
            $temp = $this->convertDigit($dig2);
            switch ($dig1) {
                case '2': return "twenty-$temp";
                case '3': return "thirty-$temp";
                case '4': return "forty-$temp";
                case '5': return "fifty-$temp";
                case '6': return "sixty-$temp";
                case '7': return "seventy-$temp";
                case '8': return "eighty-$temp";
                case '9': return "ninety-$temp";
            }
        }
    }// convertTwoDigit

}
