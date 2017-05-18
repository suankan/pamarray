#Description

Class classes/PamArray.php implements special way for sorting PAM arrays according to custom user-specified order.

Example PAM array:
```
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
```

Example order:
```
        $order = ['up', 'right', 'down', 'left'];
```

Example sort result:
```
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
```

#Implementation logic
We will be comparing array items as in above example.

Comparing will be done according to order specified by user in a human-readable way (see above example).

The basis of determining which array element is bigger will be comparing keys of the selected order which value corresponds to the value of elements array['direction'].

E.g. for order like `$order = ['up', 'right', 'down', 'left'];`, elements in a given $array which have elements `$array['direction'] = 'up'` will have `key = 0` and elements `$array['direction'] = 'right'` will have `key = 1` and so on. And comparison of two `$array` elements is done by comparing the above keys. 

#Testing:
1. Download phpunit https://phar.phpunit.de/phpunit-5.7.19.phar and make it executable.

2. Execute tests:

Please refer to https://phpunit.de/getting-started.html for more details on using phpunit. 
```
$ phpunit --bootstrap classes/PamArray.php tests/SortTest.php 
PHPUnit 5.7.19 by Sebastian Bergmann and contributors.

....                                                                4 / 4 (100%)

Time: 179 ms, Memory: 13.75MB

OK (4 tests, 4 assertions)
```
