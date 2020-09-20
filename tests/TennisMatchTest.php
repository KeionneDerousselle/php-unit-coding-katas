<?php

use PHPUnit\Framework\TestCase;
use App\TennisMatch;
use App\TennisPlayer;

/** @covers TennisMatch */
class TennisMatchTest extends TestCase
{
    public function data()
    {
        return [
            [0, 0, 'love-love'],
            [1, 0, 'fifteen-love'],
            [2, 0, 'thirty-love'],
            [2, 2, 'thirty-thirty'],
            [3, 0, 'forty-love'],
            [4, 0, 'John wins!'],
            [4, 2, 'John wins!'],
            [0, 4, 'Jane wins!'],
            [2, 4, 'Jane wins!'],
            [3, 3, 'deuce'],
            [5, 5, 'deuce'],
            [4, 3, 'Advantage: John!'],
            [3, 4, 'Advantage: Jane!']
        ];
    }

    /**
     * @test
     * @dataProvider data
     */
    public function it_should_calculate_the_score_for_a_tennis_match($p1Points, $p2Points, $expectedScore)
    {
        $match = new TennisMatch(
            $john = new TennisPlayer('John'),
            $jane = new TennisPlayer('Jane')
        );
        for ($i = 0; $i < $p1Points; $i++) {
            $john->score();
        }

        for ($i = 0; $i < $p2Points; $i++) {
            $jane->score();
        }

        $this->assertEquals($match->getScore(), $expectedScore);
    }
}
