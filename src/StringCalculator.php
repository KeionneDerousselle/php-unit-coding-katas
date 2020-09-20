<?php

namespace App;

use Exception;

class StringCalculator
{
    private const MIN_NUMBER_ALLOWED = 0;
    private const MAX_NUMBER_ALLOWED = 1000;

    protected function parseNumbers(string $numbers): array
    {
        $delimiter = ",|\n";
        $customDelimiterRegex = "\/\/(.)\n";
        $numbersStr = $numbers;

        if (preg_match("/{$customDelimiterRegex}/", $numbers, $matches)) {
            $delimiter = $matches[1];
            $numbersStr = str_replace($matches[0], '', $numbersStr);
        }

        return preg_split("/{$delimiter}/", $numbersStr);
    }

    public function add(string $numbers): int
    {
        $numsToAdd = [];

        foreach ($this->parseNumbers($numbers) as $num) {
            if ($num < self::MIN_NUMBER_ALLOWED) {
                throw new Exception('The string calculator cannot add numbers less than ' . self::MAX_NUMBER_ALLOWED . '.');
            }

            if ($num <= self::MAX_NUMBER_ALLOWED) {
                $numsToAdd[] = $num;
            }
        }

        return array_sum($numsToAdd);
    }
}
