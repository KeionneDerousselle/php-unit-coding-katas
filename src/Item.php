<?php

namespace App;

class Item
{
    protected int $sellIn;
    protected int $quality;

    protected const MIN_QUALITY = 0;
    protected const MAX_QUALITY = 50;

    public function __construct($quality, $sellIn)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function getQuality()
    {
        return $this->quality;
    }

    public function getSellIn()
    {
        return $this->sellIn;
    }

    protected function fixQualityWithinBounds($quality)
    {
        return max(self::MIN_QUALITY, min(self::MAX_QUALITY, $quality));
    }

    public function tick()
    {
        $this->sellIn--;

        $newQuality = $this->quality;
        $qualityDecrement = $this->sellIn <= 0 ? 2 : 1;

        $this->quality = $this->fixQualityWithinBounds($newQuality - $qualityDecrement);
    }
}
