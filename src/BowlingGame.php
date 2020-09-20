<?php

namespace App;

class BowlingGame
{
    private const FRAMES_PER_GAME = 10;
    protected array $rolls = [];

    /**
     * performs a roll
     * @param int $pins
     * @return void
     */
    public function roll(int $pins)
    {
        $this->rolls[] = $pins;
    }

    /**
     * determines where a strike was bowled
     * @param int $roll
     * @return bool
     */
    protected function isStrike(int $roll) : bool
    {
        return $this->rolls[$roll] === 10;
    }

    protected function addStrikeBonus($roll) : int
    {
        return $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
    }

    /**
     * determines where a spare was bowled
     * @param int $roll
     * @return bool
     */
    protected function isSpare(int $roll) : bool
    {
        return $this->getDefaultFrameScore($roll) === 10;
    }

    protected function addSpareBonus($roll) : int
    {
        return $this->rolls[$roll + 2];
    }

    /**
     * @param int $roll
     * @return int default score for the frame
     */
    protected function getDefaultFrameScore(int $roll) : int
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1];
    }

    public function score()
    {
        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAMES_PER_GAME) as $frame) {
            if ($this->isStrike($roll)) {
                $score += $this->rolls[$roll] + $this->addStrikeBonus($roll);
                $roll += 1;
            } else {
                $score += $this->getDefaultFrameScore($roll);

                if ($this->isSpare($roll)) {
                    $score += $this->addSpareBonus($roll);
                }

                $roll += 2;
            }
        }
        return $score;
    }
}
