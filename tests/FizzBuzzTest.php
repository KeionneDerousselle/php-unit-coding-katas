<?php

use App\FizzBuzz;
use PHPUnit\Framework\TestCase;

/** @covers FizzBuzz */
class FizzBuzzTest extends TestCase
{
    /** @test */
    public function it_should_return_fizz_for_multiples_of_three()
    {
        foreach ([3, 6, 9, 12] as $num) {
            $this->assertEquals(FizzBuzz::convert($num), 'fizz');
        }
    }

    /** @test */
    public function it_should_return_buzz_for_multiples_of_five()
    {
        foreach ([5, 10, 20, 25] as $num) {
            $this->assertEquals(FizzBuzz::convert($num), 'buzz');
        }
    }

    /** @test */
    public function it_should_return_fizzbuzz_for_multiples_of_three_and_five()
    {
        foreach ([15, 30, 45, 60] as $num) {
            $this->assertEquals(FizzBuzz::convert($num), 'fizzbuzz');
        }
    }

    /** @test */
    public function it_should_return_the_original_number_for_numbers_that_are_not_multiples_of_three_or_five()
    {
        foreach ([1, 2, 4, 7, 8, 11] as $num) {
            $this->assertEquals(FizzBuzz::convert($num), $num);
        }
    }
}
