<?php

namespace App;

class BackstagePasses extends Item
{
    public function tick()
    {
        $this->sellIn--;

        $newQuality = $this->quality;
        $qualityIncrement = 0;

        if ($this->sellIn < 0) {
            $newQuality = 0;
        } elseif ($this->sellIn <= 5) {
            $qualityIncrement = 3;
        } elseif ($this->sellIn <= 10) {
            $qualityIncrement = 2;
        } else {
            $qualityIncrement = 1;
        }

        $this->quality = $this->fixQualityWithinBounds($newQuality + $qualityIncrement);
    }
}
