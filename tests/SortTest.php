<?php

namespace pamarray;
use PHPUnit\Framework\TestCase;

/**
 * @covers Sort
 */
class SortTest extends TestCase
{
    private $array = [
        ['name' => 'example04', 'direction' => 'down'],
        ['name' => 'example00', 'direction' => 'up'],
        ['name' => 'example02', 'direction' => 'right'],
        ['name' => 'example06', 'direction' => 'left'],
        ['name' => 'example01', 'direction' => 'up'],
        ['name' => 'example03', 'direction' => 'right'],
        ['name' => 'example05', 'direction' => 'down'],
        ['name' => 'example07', 'direction' => 'left'],
    ];

    /**
     * Tests output of the PamArray->sort method with order up, right, down, left.
     */
    public function testSortUpRightDownLeft()
    {
        $order = ['up', 'right', 'down', 'left'];
        $expected = [
            ['name' => 'example00', 'direction' => 'up'],
            ['name' => 'example01', 'direction' => 'up'],
            ['name' => 'example02', 'direction' => 'right'],
            ['name' => 'example03', 'direction' => 'right'],
            ['name' => 'example04', 'direction' => 'down'],
            ['name' => 'example05', 'direction' => 'down'],
            ['name' => 'example06', 'direction' => 'left'],
            ['name' => 'example07', 'direction' => 'left'],
        ];

        $pamArray = new PamArray($this->array);
        $this->assertEquals($expected, $pamArray->sort($order), $message = 'Array sorted wrong!');
    }

    /**
     * Tests output of the PamArray->sort method with order right, down, left, up.
     */
    public function testSortRightDownLeftUp()
    {
        $order = ['right', 'down', 'left', 'up'];
        $expected = [
            ['name' => 'example02', 'direction' => 'right'],
            ['name' => 'example03', 'direction' => 'right'],
            ['name' => 'example04', 'direction' => 'down'],
            ['name' => 'example05', 'direction' => 'down'],
            ['name' => 'example06', 'direction' => 'left'],
            ['name' => 'example07', 'direction' => 'left'],
            ['name' => 'example00', 'direction' => 'up'],
            ['name' => 'example01', 'direction' => 'up'],
        ];

        $pamArray = new PamArray($this->array);
        $this->assertEquals($expected, $pamArray->sort($order), $message = 'Array sorted wrong!');
    }

    /**
     * Tests output of the PamArray->sort method with order down, left, up, right.
     */
    public function testSortDownLeftUpRight()
    {
        $order = ['down', 'left', 'up', 'right'];
        $expected = [
            ['name' => 'example04', 'direction' => 'down'],
            ['name' => 'example05', 'direction' => 'down'],
            ['name' => 'example06', 'direction' => 'left'],
            ['name' => 'example07', 'direction' => 'left'],
            ['name' => 'example00', 'direction' => 'up'],
            ['name' => 'example01', 'direction' => 'up'],
            ['name' => 'example02', 'direction' => 'right'],
            ['name' => 'example03', 'direction' => 'right'],
        ];

        $pamArray = new PamArray($this->array);
        $this->assertEquals($expected, $pamArray->sort($order), $message = 'Array sorted wrong!');
    }

    /**
     * Tests output of the PamArray->sort method with order left, up, right, down.
     */
    public function testSortLeftUpRightDown()
    {
        $order = ['left', 'up', 'right', 'down'];
        $expected = [
            ['name' => 'example06', 'direction' => 'left'],
            ['name' => 'example07', 'direction' => 'left'],
            ['name' => 'example00', 'direction' => 'up'],
            ['name' => 'example01', 'direction' => 'up'],
            ['name' => 'example02', 'direction' => 'right'],
            ['name' => 'example03', 'direction' => 'right'],
            ['name' => 'example04', 'direction' => 'down'],
            ['name' => 'example05', 'direction' => 'down'],
        ];

        $pamArray = new PamArray($this->array);
        $this->assertEquals($expected, $pamArray->sort($order), $message = 'Array sorted wrong!');
    }
}
