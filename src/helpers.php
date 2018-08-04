<?php

use ArrayDot\ArrayDot;

if(!function_exists('array_dot')) {
    function array_dot(array &$array, string $expression = null, $value = null)
    {
        return ArrayDot::getInstance()->execute($array, $expression, $value);
    }
}
