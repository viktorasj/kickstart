<?php
/**
 * Created by PhpStorm.
 * User: vic
 * Date: 18.12.7
 * Time: 23.22
 */

namespace App\Services;


interface NumberFormaterInterface
{
    public function formatNumber (float $number): ?string;
    public function formatToMillions (float $number): string;
    public function formatToThousands (float $number): string;
    public function formatToIntegerWithGap (float $number): string;
    public function formatToDec (float $number): string;

}

