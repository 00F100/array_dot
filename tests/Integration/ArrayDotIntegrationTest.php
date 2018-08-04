<?php

use ArrayDot\ArrayDot;
use ArrayDot\Interfaces\IArrayDot;
use PHPUnit\Framework\TestCase;

class ArrayDotIntegrationTest extends TestCase
{
    private $instance;

    public function setUp()
    {
    }

    public function testSet()
    {
        $array = [
            'config' => [
                'file' => 'example_file.txt'
            ]
        ];
        array_dot($array, 'config.file', '1234');
        $this->assertTrue(array_dot($array, 'config.file') == '1234');
    }

    public function testSetNewItem()
    {
        $array = [
            'config' => [
                'file' => 'example_file.txt'
            ]
        ];
        array_dot($array, 'config.file.example', '1234');
        $this->assertTrue(array_dot($array, 'config.file.example') == '1234');
    }

    public function testGet()
    {
        $array = [
            'config' => [
                'file' => 'example_file.txt'
            ]
        ];
        $this->assertTrue(array_dot($array, 'config.file') == 'example_file.txt');
    }

    public function testGetEmpty()
    {
        $array = [
            'config' => [
                'file' => 'example_file.txt'
            ]
        ];
        $this->assertTrue(array_dot($array) == $array);
    }

    public function testSetMulti()
    {
        $array = [
            'config' => [
                'file' => 'example_file.txt'
            ]
        ];
        array_dot($array, 'config.file.another.item.into', '1234');
        $this->assertTrue(array_dot($array, 'config.file.another.item.into') == '1234');
    }
}
