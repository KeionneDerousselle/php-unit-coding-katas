<?php

use PHPUnit\Framework\TestCase;
use App\PrimeFactors;

/** @covers PrimeFactors */
class PrimeFactorsTest extends TestCase
{
    public function factors()
    {
        return [
            [1, []],
            [2, [2]],
            [4, [2, 2]],
            [25, [5, 5]],
            [100, [2, 2, 5, 5]],
            [999, [3, 3, 3, 37]]
        ];
    }

    /**
     * @test
     * @dataProvider factors
     */
    public function it_should_generates_prime_factors($number, $expectedFactors)
    {
        $pf = new PrimeFactors();
        $this->assertEquals($expectedFactors, $pf->generate($number));
    }
}
