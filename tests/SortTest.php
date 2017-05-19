<?php

namespace pamarray;
use PHPUnit\Framework\TestCase;

/**
 * Running unit tests over the special way how PAM arrays should be sorted.
 *
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

        $actual = $this->pamArray->sort($order);

        $this->assertEquals($expected, $actual, $message = 'Array sorted wrong!');
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

        $actual = $this->pamArray->sort($order);

        $this->assertEquals($expected, $actual, $message = 'Array sorted wrong!');
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

        $actual = $this->pamArray->sort($order);

        $this->assertEquals($expected, $actual, $message = 'Array sorted wrong!');
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

        $actual = $this->pamArray->sort($order);

        $this->assertEquals($expected, $actual, $message = 'Array sorted wrong!');
    }

    public function testSortWithUnexpectedDirection()
    {
        $order = ['up', 'right', 'down', 'left'];

        $array = [
            ['name' => 'example', 'direction' => 'up'],
            ['name' => 'example', 'direction' => 'wrong'],
            ['name' => 'example', 'direction' => 'right'],
            ['name' => 'example', 'direction' => 'next'],
            ['name' => 'example', 'direction' => 'left'],
            ['name' => 'example', 'direction' => 'down'],
        ];

        $expected = [
            ['name' => 'example', 'direction' => 'up'],
            ['name' => 'example', 'direction' => 'right'],
            ['name' => 'example', 'direction' => 'down'],
            ['name' => 'example', 'direction' => 'left'],
            ['name' => 'example', 'direction' => 'wrong'],
            ['name' => 'example', 'direction' => 'next'],
        ];

        $this->pamArray = new PamArray($array);
        $actual = $this->pamArray->sort($order);

        $this->assertEquals($expected, $actual, $message = 'Array sorted wrong!');
    }
}
