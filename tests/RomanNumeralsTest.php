<?php
use PHPUnit\Framework\TestCase;
use App\RomanNumerals;

/** @covers RomanNumerals */
class RomanNumeralsTest extends TestCase
{
    public function data()
    {
        return [
            [1, 'i'],
            [2, 'ii'],
            [3, 'iii'],
            [4, 'iv'],
            [5, 'v'],
            [6, 'vi'],
            [9, 'ix'],
            [10, 'x'],
            [40, 'xl'],
            [50, 'l'],
            [90, 'xc'],
            [100, 'c'],
            [400, 'cd'],
            [500, 'd'],
            [900, 'cm'],
            [1000, 'm'],
            [3999, 'mmmcmxcix']
        ];
    }

    /**
     * @test
     * @dataProvider data
     * */
    public function it_should_generate_the_roman_numeral($number, $expectedRomanNumeral)
    {
        $this->assertEquals($expectedRomanNumeral, RomanNumerals::generate($number));
    }

    /** @test */
    public function it_should_throw_an_exception_when_the_number_is_0()
    {
        $this->expectException(\Exception::class);
        RomanNumerals::generate(0);
    }

    /** @test */
    public function it_should_throw_an_exception_when_the_number_is_greater_than_3999()
    {
        $this->expectException(\Exception::class);
        RomanNumerals::generate(4000);
    }
}
