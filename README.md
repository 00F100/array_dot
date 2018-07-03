# array_dot

array_dot method to navigate into array

## How to install

Composer:

```sh
$ composer require 00f100/array_dot
```

or add in composer.json

```json
{
	"require": {
		"00f100/array_dot": "*"
	}
}
```

## How to use

```php
<?php

$array = [];

array_dot($array, 'config.item', 'content');

// Print: content
echo array_dot($array, 'config.item');
```