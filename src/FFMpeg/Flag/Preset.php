<?php

namespace FFMpeg\Flag;

use FFMpeg\Coordinate\Timecode;

class Preset extends Flag
{
    /*
    * Crf
    *
    */
    public function __construct($preset = 'slow') {
        $this->preset = $preset;
    }

    /**
    * Apply Flag.
    *
    * @return Array
    */
    public function apply() {
        return ['-preset' => $this->preset];
    }
}
