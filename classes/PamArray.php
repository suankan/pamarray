<?php

namespace pamarray;

class PamArray
{
    protected $arrayData;
    /**
     * @var array e.g. ['up', 'right', 'down', 'left'] or ['down', 'up', 'left', 'right']
     */
    protected $order;

    public function __construct($arrayData)
    {
        $this->arrayData = $arrayData;
    }

    /**
     * @param $order array e.g. ['up', 'right', 'down', 'left']
     */
    public function sort($order)
    {
        $this->order = $order;
        usort($this->arrayData, [$this, 'sortMethod']);

        return $this->arrayData;
    }

    /**
     * We will be comparing array items such as:
     * ['name' => 'example', 'direction' => 'up'],
     * ['name' => 'example', 'direction' => 'left'],
     * ['name' => 'example', 'direction' => 'right'],
     * ['name' => 'example', 'direction' => 'down'],
     *
     * Comparing will be done according to order specified by user in a human-readable way (see $this->order).
     * The basis of deterimining which element is bigger will be comparing keys of $this->order that correspond
     * to the values of elements array['direction'].
     *
     * @param $a
     * @param $b
     * @return int
     */
    private function sortMethod($a, $b)
    {
        $aKey = $this->getKeyOfMatchingElement($a['direction'], $this->order);
        $bKey = $this->getKeyOfMatchingElement($b['direction'], $this->order);

        if ($aKey == $bKey and $aKey !== false) {
            return 0;
        }

        return ($aKey < $bKey) ? -1 : 1;
    }

    /**
     * Returns serial number of element in a given array or false if element does not exist in array.
     *
     * @param $element what to search
     * @param $array where to search
     * @return bool|int serial number of element in a given array or false element does not exist in array.
     */
    private function getKeyOfMatchingElement($element, $array) {
        foreach ($array as $key => $value)
        {
            if ($element == $value)
            {
                return $key;
            }
        }
        return false;
    }

}
