<?php

namespace App;

use Exception;

class RomanNumerals
{
    private const MIN = 1;
    private const MAX = 3999;

    const NUMERALS = [
        'm' => 1000,
        'cm' => 900,
        'd' => 500,
        'cd' => 400,
        'c' => 100,
        'xc' => 90,
        'l' => 50,
        'xl' => 40,
        'x' => 10,
        'ix' => 9,
        'v' => 5,
        'iv' => 4,
        'i' => 1
    ];

    public static function generate($num)
    {
        if ($num < static::MIN || $num > static::MAX) {
            throw new Exception('Roman numerals can only be calculated for a number between 1 and 3999.');
        }

        $number = $num;
        $result = '';

        foreach (static::NUMERALS as $numeral => $arabic) {
            for (; $number >= $arabic; $number -= $arabic) {
                $result .= $numeral;
            }
        }

        return $result;
    }
}
