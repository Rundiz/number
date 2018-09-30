<?php
/** 
 * @license http://opensource.org/licenses/MIT MIT
 */


/**
 * Format nice var_export
 * 
 * @link https://stackoverflow.com/questions/24316347/how-to-format-var-export-to-php5-4-array-syntax Adaption from this.
 * @param mixed $var
 * @param string $indent
 * @return string
 */
function var_export54($var, $indent='') {
    switch (gettype($var)) {
        case 'integer':
        case 'double':
            return $var;
        case 'string':
            return '\'' . addcslashes($var, "\\\$\"\r\n\t\v\f") . '\'';
        case 'array':
            $indexed = array_keys($var) === range(0, count($var) - 1);
            $r = [];
            foreach ($var as $key => $value) {
                $r[] = "$indent    "
                     . ($indexed ? '' : var_export54($key) . ' => ')
                     . var_export54($value, "$indent    ");
            }
            return 'array(' . "\n" . implode(",\n", $r) . "\n" . $indent . ')';
        case 'boolean':
            return $var ? 'TRUE' : 'FALSE';
        default:
            return var_export($var, TRUE);
    }
}