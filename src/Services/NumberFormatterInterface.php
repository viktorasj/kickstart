<?php

namespace App\Services;


interface NumberFormatterInterface
{
    public function formatNumber (float $number): ?string;
}

