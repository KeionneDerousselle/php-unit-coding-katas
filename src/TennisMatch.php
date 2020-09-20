<?php

namespace App;

class TennisMatch
{
    protected TennisPlayer $playerOne;
    protected TennisPlayer $playerTwo;
    protected const TERMS = [
        0 => 'love',
        1 => 'fifteen',
        2 => 'thirty',
        3 => 'forty'
    ];

    public function __construct(TennisPlayer $playerOne, TennisPlayer $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    protected function getTermFromPoint(int $points) : string
    {
        return self::TERMS[$points];
    }

    protected function hasWinner() : bool
    {
        if ($this->playerOne->getPoints() < 4 && $this->playerTwo->getPoints() < 4) {
            return false;
        }

        return abs($this->playerOne->getPoints() - $this->playerTwo->getPoints()) >= 2;
    }

    protected function getLeader() : TennisPlayer
    {
        return $this->playerOne->getPoints() > $this->playerTwo->getPoints() ? $this->playerOne : $this->playerTwo;
    }

    protected function isDeuce() : bool
    {
        return $this->hasReachedDeuceThreshold() &&
            $this->playerOne->getPoints() === $this->playerTwo->getPoints();
    }

    protected function hasReachedDeuceThreshold() : bool
    {
        return $this->playerOne->getPoints() >= 3 && $this->playerTwo->getPoints() >= 3;
    }

    protected function hasAdvantage() : bool
    {
        if (!$this->hasReachedDeuceThreshold()) {
            return false;
        }

        return !$this->isDeuce();
    }

    public function getScore() : string
    {
        if ($this->hasWinner()) {
            return $this->getLeader()->getName() . ' wins!';
        }

        if ($this->hasAdvantage()) {
            return 'Advantage: ' . $this->getLeader()->getName() . '!';
        }

        if ($this->isDeuce()) {
            return 'deuce';
        }

        return $this->getTermFromPoint($this->playerOne->getPoints()) . '-' . $this->getTermFromPoint($this->playerTwo->getPoints());
    }
}
