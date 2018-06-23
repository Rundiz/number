# Number Component

The Number classes provide formatting, convertions classes and methods for working with numeric values.<br>
The Number[Language] class is for convert number to text in Thai and English languages.<br>
In Thai language it is including number to Thai Baht conversion.

[![Latest Stable Version](https://poser.pugx.org/rundiz/number/v/stable)](https://packagist.org/packages/rundiz/number)
[![License](https://poser.pugx.org/rundiz/number/license)](https://packagist.org/packages/rundiz/number)
[![Total Downloads](https://poser.pugx.org/rundiz/number/downloads)](https://packagist.org/packages/rundiz/number)

## Example:

### Convert number:

```php
// For English require NumberEng.php, for Thai require NumberThai.php
require 'Rundiz/Number/NumberEng.php';

// For English use NumberEng(), for Thai use NumberThai()
$number_text = new Rundiz\Number\NumberEng();

echo $number_text->convertNumber('101');
// the result should be:
// one hundred and one (for English)
// หนึ่งร้อยเอ็ด (for Thai)
```

### Convert Thai Baht:

```php
require 'Rundiz/Number/NumberThai.php';

$number_text = new Rundiz\Number\NumberThai();

echo $number_text->convertBaht('3.23');
// the result should be:
// สามบาทยี่สิบสามสตางค์
```

### Convert file size to Bytes:

```php
require 'Rundiz/Number/Number.php';

$number = new Rundiz\Number\Number();

echo $number->toBytes('1.3KB'); // 1300
echo $number->toBytes('1.3KiB'); // 1331.2
```

### Convert to other file size unit from Bytes:

```php
require 'Rundiz/Number/Number.php';

$number = new Rundiz\Number\Number();

echo $number->fromBytes('100000'); // 100.00 KB
echo $number->fromBytes('133300'); // 133.30 KB
echo $number->fromBytes('10000', 'KiB); // 9.76 KiB
```

### Remove dot zero digits:

```php
require 'Rundiz/Number/Number.php';

$Number = new Rundiz\Number\Number();

echo $Number->removeDotZero('1987.0000000000'); // 1987
echo $Number->removeDotZero('35.400'); // 35.400
echo $Number->removeDotZero('35.400', false); // 35.4
echo $Number->removeDotZero('35,400', false, ','); // 35,4 (european number format)
```


---

For more example, please look inside **tests** folder.
