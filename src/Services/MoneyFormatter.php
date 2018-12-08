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
     * @var        NumberFormatter
     * @var string numberToMoney
     */
    private $numberFormatter;
    private $numberToMoney;

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
     */
    public function formatEur(float $number): void
    {
        $this->numberFormatter->formatNumber($number);
        $this->numberToMoney = $this->numberFormatter->getFormatedNumber().' €';
    }

    /**
     * @param float $number
     */
    public function formatUsd(float $number): void
    {
        $this->numberFormatter->formatNumber($number);
        $this->numberToMoney = '$ '.$this->numberFormatter->getFormatedNumber();
    }

    /**
     * @param string $ntm
     */
    public function setNumberToMoney(string $ntm): void
    {
        $this->numberToMoney = $ntm;
    }

    /**
     * @return string
     */
    public function getNumberToMoney(): string
    {
        return $this->numberToMoney;
    }
}