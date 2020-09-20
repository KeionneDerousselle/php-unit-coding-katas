<?php

namespace App;

class FizzBuzz
{
    public static function convert(int $num) : string
    {
        $result = '';

        if ($num % 3 === 0) {
            $result .= 'fizz';
        }

        if ($num % 5 === 0) {
            $result .= 'buzz';
        }

        return $result ?: $num;
    }
}
