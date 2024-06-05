<?php

if (!function_exists('makeResult')) {
    function makeResult(int $randomNumber): string
    {
        return $randomNumber % 2 === 0 ? 'Win' : 'Lose';
    }
}

if (!function_exists('makeAmount')) {
    function makeAmount(int $randomNumber): float
    {
        return match (true) {
            $randomNumber > 900 => $randomNumber * 0.7,
            $randomNumber > 600 => $randomNumber * 0.5,
            $randomNumber > 300 => $randomNumber * 0.3,
            default => $randomNumber * 0.1,
        };
    }
}
