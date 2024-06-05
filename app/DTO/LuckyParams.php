<?php

namespace App\DTO;

class LuckyParams
{
    public function __construct(
        public int $randomNumber,
        public string $result,
        public float $winAmount
    ) {}
}
