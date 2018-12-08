<?php
/**
 * Created by PhpStorm.
 * User: vic
 * Date: 18.12.8
 * Time: 02.00
 */

namespace App\Services;


class MoneyFormatter
{
    /**
     * @var NumberFormatter $numberFormatter
     */
    private $numberFormatter;

    /**
     * MoneyFormatter constructor.
     * @param NumberFormatter $numberFormatter
     */
    public function __construct(NumberFormatter $numberFormatter)
    {
        $this->numberFormatter = $numberFormatter;
    }

    /**
     * @param float $number
     * @return string
     */
    public function formatEur(float $number): string
    {
        return $this->numberFormatter->formatNumber($number).' €';
    }

    /**
     * @param float $number
     * @return string
     */
    public function formatUsd(float $number): string
    {
        return '$ '.$this->numberFormatter->formatNumber($number);
    }
}