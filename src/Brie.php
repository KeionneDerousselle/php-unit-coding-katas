<?php

namespace App;

class Brie extends Item
{
    public function tick()
    {
        $this->sellIn--;

        $newQuality = $this->quality;
        $qualityIncrement = $this->sellIn < 0 ? 2 : 1;

        $this->quality = $this->fixQualityWithinBounds($newQuality + $qualityIncrement);
    }
}
