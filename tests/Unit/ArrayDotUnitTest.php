<?php

use ArrayDot\ArrayDot;
use ArrayDot\Interfaces\IArrayDot;
use PHPUnit\Framework\TestCase;

class ArrayDotUnitTest extends TestCase
{
    private $instance;

    public function setUp()
    {
        $this->instance = new ArrayDot();
    }

    public function testInstance()
    {
        $this->assertTrue($this->instance instanceof IArrayDot);
    }

    public function testSet()
    {
        $array = [
            'config' => [
                'file' => 'example_file.txt'
            ]
        ];
        $this->instance->execute($array, 'config.file', '1234');
        $this->assertTrue($this->instance->execute($array, 'config.file') == '1234');
    }

    public function testSetMulti()
    {
        $array = [
            'config' => [
                'file' => 'example_file.txt'
            ]
        ];
        $this->instance->execute($array, 'config.file.another.item.into', '1234');
        $this->assertTrue($this->instance->execute($array, 'config.file.another.item.into') == '1234');
    }

    public function testSetNewItem()
    {
        $array = [
            'config' => [
                'file' => 'example_file.txt'
            ]
        ];
        $this->instance->execute($array, 'config.file.example', '1234');
        $this->assertTrue($this->instance->execute($array, 'config.file.example') == '1234');
    }

    public function testGet()
    {
        $array = [
            'config' => [
                'file' => 'example_file.txt'
            ]
        ];
        $this->assertTrue($this->instance->execute($array, 'config.file') == 'example_file.txt');
    }

    public function testGetEmpty()
    {
        $array = [
            'config' => [
                'file' => 'example_file.txt'
            ]
        ];
        $this->assertTrue($this->instance->execute($array) == $array);
    }

    public function testSetNewEmpty()
    {
        $array = [];
        $this->assertTrue($this->instance->execute($array) == $array);
        $this->instance->execute($array, 'config.file.example', '1234');
        $this->assertTrue($this->instance->execute($array, 'config.file.example') == '1234');
    }

    public function testGetInstance()
    {
        $this->assertTrue(ArrayDot::getInstance() instanceof IArrayDot);
    }
}
