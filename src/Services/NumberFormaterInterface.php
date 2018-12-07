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
    public function formatNumber (float $number): void;
    public function formatToMillions (float $number): void;
    public function formatToThousands (float $number): void;
    public function formatToIntegerWithGap (float $number): void;
    public function formatToDec (float $number): void;
    public function setFormatedNumber (string $number): void;
    public function getFormatedNumber (): string;
}