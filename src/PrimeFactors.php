<?php

namespace App;

class PrimeFactors
{
    public function generate($num)
    {
        $factors = [];
        $number = $num;

        for ($divisor = 2; $number > 1; $divisor++) {
            for (; $number % $divisor === 0; $number /= $divisor) {
                $factors[] = $divisor;
            }
        }

        return $factors;
    }
}
