<?php

namespace pamarray;

class PamArray
{
    protected $array;
    protected $order;

    public function __construct($array)
    {
        $this->array = $array;
    }

    /**
     * @param $order array e.g. ['up', 'right', 'down', 'left'] or ['down', 'up', 'left', 'right']
     */
    public function sort($order)
    {
        //TODO using usort($array, 'sortMethod')
    }

    private function sortMethod($a, $b)
    {
        //TODO
    }

}
