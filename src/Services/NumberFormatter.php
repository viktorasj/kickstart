<?php
/**
 * Created by PhpStorm.
 * User: vic
 * Date: 18.12.7
 * Time: 23.17
 */

namespace App\Services;


class NumberFormatter implements NumberFormaterInterface
{
    /**
     * @var string $formatedNumber
     */
    private $formatedNumber;

    /**
     * @param float $number
     */
    public function formatNumber(float $number): void
    {
        if ($number >= 999500 || $number <= -999500){
            $this->formatToMillions($number);
        }elseif ($number >= 99950 && $number < 999500 || $number <= -99950 && $number > -999500){
            $this->formatToThousands($number);
        }elseif ($number >= 1000 && $number < 99950 || $number <= -1000 && $number > -99950) {
            $this->formatToIntegerWithGap($number);
        }elseif ($number >= 0 && $number < 1000 || $number < 0 && $number > -1000){
            $this->formatToDec($number);
        }
    }

    /**
     * @param float $number
     */
    public function formatToMillions (float $number): void
    {
        $formatedNumber = strval(number_format(($number/1000000), 2)).'M';
        $this->setFormatedNumber($formatedNumber);
    }

    /**
     * @param float $number
     */
    public function formatToThousands(float $number): void
    {
        $formatedNumber = strval(number_format(($number/1000), 0)).'K';
        $this->setFormatedNumber($formatedNumber);
    }

    /**
     * @param float $number
     */
    public function formatToIntegerWithGap(float $number): void
    {
        $formatedNumber = strval(number_format(($number), 0, '.', ' '));
        $this->setFormatedNumber($formatedNumber);
    }

    /**
     * @param float $number
     */
    public function formatToDec(float $number): void
    {
        $formatedNumber = str_replace('.00', '', number_format(($number), 2, '.', ' '));
        $this->setFormatedNumber($formatedNumber);
    }

    /**
     * @param string $fNumber
     */
    public function setFormatedNumber(string $fNumber): void
    {
        $this->formatedNumber = $fNumber;
    }

    /**
     * @return string
     */
    public function getFormatedNumber (): string
    {
        return $this->formatedNumber;
    }
}