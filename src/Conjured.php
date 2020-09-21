<?php

namespace App;

class Conjured extends Item
{
    public function tick()
    {
        $this->sellIn--;

        $newQuality = $this->quality;
        $qualityDecrement = $this->sellIn <= 0 ? 4 : 2;

        $this->quality = $this->fixQualityWithinBounds($newQuality - $qualityDecrement);
    }
}
