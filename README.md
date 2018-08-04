# array_dot

array_dot method to navigate into array

[![Build Status](https://travis-ci.org/00F100/array_dot.svg?branch=master)](https://travis-ci.org/00F100/array_dot) [![codecov](https://codecov.io/gh/00F100/array_dot/branch/master/graph/badge.svg)](https://codecov.io/gh/00F100/array_dot) [![Total Downloads](https://poser.pugx.org/00F100/array_dot/downloads)](https://packagist.org/packages/00F100/array_dot)

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