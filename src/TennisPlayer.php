<?php

namespace App;

class TennisPlayer
{
    protected string $name;
    protected int $points = 0;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function score()
    {
        $this->points++;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPoints()
    {
        return $this->points;
    }
}
