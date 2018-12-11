<?php

namespace App\Services;


class MoneyFormatter
{
    /**
     * @var NumberFormatterInterface
     */
    private $numberFormatter;

    /**
     * MoneyFormatter constructor.
     * @param NumberFormatterInterface $numberFormatter
     */
    public function __construct(NumberFormatterInterface $numberFormatter)
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