<?php

namespace pamarray;
use PHPUnit\Framework\TestCase;

/**
 * @covers Sort
 */
class SortTest extends TestCase
{
    private $array;
    private $pamArray;

    /**
     * This will be called before each test method to make sure that we are shuffling array to its initial state.
     */
    protected function setUp()
    {
        $this->array = [
            ['name' => 'example', 'direction' => 'down'],
            ['name' => 'example', 'direction' => 'up'],
            ['name' => 'example', 'direction' => 'right'],
            ['name' => 'example', 'direction' => 'left'],
            ['name' => 'example', 'direction' => 'up'],
            ['name' => 'example', 'direction' => 'right'],
            ['name' => 'example', 'direction' => 'down'],
            ['name' => 'example', 'direction' => 'left'],
        ];

        $this->pamArray = new PamArray($this->array);
    }

    /**
     * Tests output of the PamArray->sort method with order up, right, down, left.
     */
    public function testSortUpRightDownLeft()
    {
        $order = ['up', 'right', 'down', 'left'];
        $expected = [
            ['name' => 'example', 'direction' => 'up'],
            ['name' => 'example', 'direction' => 'up'],
            ['name' => 'example', 'direction' => 'right'],
            ['name' => 'example', 'direction' => 'right'],
            ['name' => 'example', 'direction' => 'down'],
            ['name' => 'example', 'direction' => 'down'],
            ['name' => 'example', 'direction' => 'left'],
            ['name' => 'example', 'direction' => 'left'],
        ];

        $pamArray = new PamArray($this->array);
        $actual = $this->pamArray->sort($order);
        $this->assertEquals($expected, $this->pamArray->sort($order), $message = 'Array sorted wrong!');
    }

    /**
     * Tests output of the PamArray->sort method with order right, down, left, up.
     */
    public function testSortRightDownLeftUp()
    {
        $order = ['right', 'down', 'left', 'up'];
        $expected = [
            ['name' => 'example', 'direction' => 'right'],
            ['name' => 'example', 'direction' => 'right'],
            ['name' => 'example', 'direction' => 'down'],
            ['name' => 'example', 'direction' => 'down'],
            ['name' => 'example', 'direction' => 'left'],
            ['name' => 'example', 'direction' => 'left'],
            ['name' => 'example', 'direction' => 'up'],
            ['name' => 'example', 'direction' => 'up'],
        ];

        $pamArray = new PamArray($this->array);
        $this->assertEquals($expected, $this->pamArray->sort($order), $message = 'Array sorted wrong!');
    }

    /**
     * Tests output of the PamArray->sort method with order down, left, up, right.
     */
    public function testSortDownLeftUpRight()
    {
        $order = ['down', 'left', 'up', 'right'];
        $expected = [
            ['name' => 'example', 'direction' => 'down'],
            ['name' => 'example', 'direction' => 'down'],
            ['name' => 'example', 'direction' => 'left'],
            ['name' => 'example', 'direction' => 'left'],
            ['name' => 'example', 'direction' => 'up'],
            ['name' => 'example', 'direction' => 'up'],
            ['name' => 'example', 'direction' => 'right'],
            ['name' => 'example', 'direction' => 'right'],
        ];

        $pamArray = new PamArray($this->array);
        $this->assertEquals($expected, $this->pamArray->sort($order), $message = 'Array sorted wrong!');
    }

    /**
     * Tests output of the PamArray->sort method with order left, up, right, down.
     */
    public function testSortLeftUpRightDown()
    {
        $order = ['left', 'up', 'right', 'down'];
        $expected = [
            ['name' => 'example', 'direction' => 'left'],
            ['name' => 'example', 'direction' => 'left'],
            ['name' => 'example', 'direction' => 'up'],
            ['name' => 'example', 'direction' => 'up'],
            ['name' => 'example', 'direction' => 'right'],
            ['name' => 'example', 'direction' => 'right'],
            ['name' => 'example', 'direction' => 'down'],
            ['name' => 'example', 'direction' => 'down'],
        ];

        $pamArray = new PamArray($this->array);
        $this->assertEquals($expected, $this->pamArray->sort($order), $message = 'Array sorted wrong!');
    }
}
