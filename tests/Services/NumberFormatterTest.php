<?php

namespace App\Tests;

use App\Services\NumberFormatter;
use PHPUnit\Framework\TestCase;

class NumberFormatterTest extends TestCase
{
    /**
     * @return array
     */
    public function providedData()
    {
        return [
            ['2.84M', 2835779],
            ['1.00M', 999500],
            ['535K', 535216],
            ['100K', 99950],
            ['27 534', 27533.78],
            ['533.10', 533.1],
            ['66.67', 66.6666],
            ['12', 12.00],
            ['0', 0],
            ['-2.84M', -2835779],
        ];
    }

    /**
     * @dataProvider providedData
     */
    public function testFormatsFromProvidedData($expected, $numberToCheck)
    {
        $numberFormatter = new NumberFormatter();
        $this->assertEquals($expected, $numberFormatter->formatNumber($numberToCheck));
    }
}
