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
     * @param float $number
     * @return string|null
     */
    public function formatNumber(float $number): ?string
    {
        if ($number >= 999500 || $number <= -999500){
            $formatedNumber = $this->formatToMillions($number);
            return $formatedNumber;
        }elseif ($number >= 99950 && $number < 999500 || $number <= -99950 && $number > -999500){
            $formatedNumber = $this->formatToThousands($number);
            return $formatedNumber;
        }elseif ($number >= 1000 && $number < 99950 || $number <= -1000 && $number > -99950) {
            $formatedNumber = $this->formatToIntegerWithGap($number);
            return $formatedNumber;
        }elseif ($number >= 0 && $number < 1000 || $number < 0 && $number > -1000){
            $formatedNumber = $this->formatToDec($number);
            return $formatedNumber;
        }
        else{
            return null;
        }
    }

    /**
     * @param float $number
     * @return string
     */
    public function formatToMillions (float $number): string
    {
        return strval(number_format(($number/1000000), 2)).'M';
    }

    /**
     * @param float $number
     * @return string
     */
    public function formatToThousands(float $number): string
    {
        return strval(number_format(($number/1000), 0)).'K';
    }

    /**
     * @param float $number
     * @return string
     */
    public function formatToIntegerWithGap(float $number): string
    {
        return  strval(number_format(($number), 0, '.', ' '));
    }

    /**
     * @param float $number
     * @return string
     */
    public function formatToDec(float $number): string
    {
        return str_replace('.00', '', number_format(($number), 2, '.', ' '));
    }
}