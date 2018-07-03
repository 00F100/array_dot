<?php

use ArrayDot\ArrayDot;

if(!function_exists('array_dot')) {
	function array_dot(array &$array, string $expression = null, string $value = null)
	{
		return ArrayDot::getInstance()->execute($array, $expression, $value);
	}
}