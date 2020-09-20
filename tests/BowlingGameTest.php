<?php

use App\BowlingGame;
use PHPUnit\Framework\TestCase;

/** @covers BowlingGame */
class BowlingGameTest extends TestCase
{
    /** @test */
    public function it_should_score_a_gutter_game_as_zero()
    {
        $game = new BowlingGame();

        foreach (range(1, 20) as $frame) {
            $game->roll(0);
        }

        $this->assertSame($game->score(), 0);
    }

    /** @test */
    public function it_should_score_a_game_where_all_ones_were_rolled()
    {
        $game = new BowlingGame();

        foreach (range(1, 20) as $frame) {
            $game->roll(1);
        }

        $this->assertSame($game->score(), 20);
    }

    /** @test */
    public function it_should_reward_a_one_roll_bonus_for_every_spare()
    {
        $game = new BowlingGame();

        $game->roll(5);
        $game->roll(5); // spare
        $game->roll(8);

        foreach (range(1, 17) as $frame) {
            $game->roll(0);
        }

        $this->assertSame($game->score(), 26);
    }

    /** @test */
    public function it_should_reward_a_two_roll_bonus_for_every_strike()
    {
        $game = new BowlingGame();

        $game->roll(10); //strike
        $game->roll(5);
        $game->roll(2);

        foreach (range(1, 16) as $frame) {
            $game->roll(0);
        }

        $this->assertSame($game->score(), 24);
    }

    /** @test */
    public function it_should_reward_an_extra_roll_for_a_spare_on_the_final_frame()
    {
        $game = new BowlingGame();

        foreach (range(1, 18) as $frame) {
            $game->roll(0);
        }

        $game->roll(5);
        $game->roll(5);// spare
        $game->roll(5); // bonus roll

        $this->assertSame($game->score(), 15);
    }

    /** @test */
    public function it_should_reward_two_extra_rolls_for_a_strike_on_the_final_frame()
    {
        $game = new BowlingGame();

        foreach (range(1, 18) as $frame) {
            $game->roll(0);
        }

        $game->roll(10); // strike
        $game->roll(10); // bonus roll 1
        $game->roll(10); // bonus roll 2

        $this->assertSame($game->score(), 30);
    }

    /** @test */
    public function it_should_score_a_perfect_game()
    {
        $game = new BowlingGame();

        foreach (range(1, 12) as $frame) {
            $game->roll(10);
        }

        $this->assertSame($game->score(), 300);
    }
}
