<?php

use App\StringCalculator;
use PHPUnit\Framework\TestCase;

/** @covers StringCalculator */
class StringCalculatorTest extends TestCase
{
    /** @test */
    public function it_should_calculate_an_empty_string_as_zero()
    {
        $calculator = new StringCalculator();
        $this->assertSame($calculator->add(''), 0);
    }

    /** @test */
    public function it_should_calculate_the_sum_of_a_single_number()
    {
        $calculator = new StringCalculator();
        $this->assertSame($calculator->add('5'), 5);
    }

    /** @test */
    public function it_should_calculate_the_sum_of_a_two_numbers()
    {
        $calculator = new StringCalculator();
        $this->assertSame($calculator->add('5,5'), 10);
    }

    /** @test */
    public function it_should_calculate_the_sum_of_any_amount_numbers()
    {
        $calculator = new StringCalculator();
        $this->assertSame($calculator->add('5,5,5,4'), 19);
    }

    /** @test */
    public function it_should_calculate_the_sum_of_any_amount_numbers_separated_by_new_lines()
    {
        $calculator = new StringCalculator();
        $this->assertSame($calculator->add("5\n5\n5\n4"), 19);
    }

    /** @test */
    public function it_should_throw_an_exception_when_given_a_negative_number()
    {
        $calculator = new StringCalculator();
        $this->expectException(\Exception::class);
        $calculator->add("-5\n5");
    }

    /** @test */
    public function it_should_ignore_any_numbers_greater_than_1000_when_calculating()
    {
        $calculator = new StringCalculator();
        $this->assertSame($calculator->add("5\n5\n5\n4000"), 15);
    }

    /** @test */
    public function it_should_support_custom_delimiters_when_calculating()
    {
        $calculator = new StringCalculator();
        $this->assertSame($calculator->add("//;\n5;5;5"), 15);
    }
}
