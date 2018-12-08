<?php

namespace App\Tests;

use App\Services\MoneyFormatter;
use App\Services\NumberFormatter;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;


class MoneyFormatterTest extends TestCase
{

    public function providedDataUsd()
    {
        return [
            ['$ 1M', '1M', 1000000],
            ['$ -2.84M', '-2.84M', -2835779],
            ['$ 27 534', '27 534', 27533.78],
            ['$ 533.10', '533.10', 533.1],
            ['$ 66.67', '66.67', 66.6666]
        ];
    }

    public function providedDataEur()
    {
        return [
            ['1M €', '1M', 1000000],
            ['-2.84M €', '-2.84M', -2835779],
            ['27 534 €', '27 534', 27533.78],
            ['533.10 €', '533.10', 533.1],
            ['66.67 €', '66.67', 66.6666]
        ];
    }

    /**
     * @dataProvider providedDataUsd
     * @param string $expected
     * @param string $formatedNumber
     * @param float  $numberToCheck
     */
    public function testUsd($expected, $formatedNumber, $numberToCheck)
    {
        $numberFormatter = $this->createMock(NumberFormatter::class);
        $numberFormatter->method('formatNumber')->willReturn($formatedNumber);
        $moneyFormatter = new MoneyFormatter($numberFormatter);
        $this->assertEquals($expected, $moneyFormatter->formatUsd($numberToCheck));
    }




    /**
     * @dataProvider providedDataEur
     * @param string $expected
     * @param string $formatedNumber
     * @param float  $numberToCheck
     */
    public function testEur($expected, $formatedNumber, $numberToCheck)
    {
        $numberFormatter = $this->createMock(NumberFormatter::class);
        $numberFormatter->method('formatNumber')->willReturn($formatedNumber);
        $moneyFormatter = new MoneyFormatter($numberFormatter);
        $this->assertEquals($expected, $moneyFormatter->formatEur($numberToCheck));
    }
}
