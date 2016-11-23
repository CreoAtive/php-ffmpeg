<?php

namespace Beesperester\FFMpeg\Flag;

use Beesperester\FFMpeg\Coordinate\Timecode;

class Clip extends Flag
{
    /*
    * Clip
    *
    */
    public function __construct(Timecode $start, Timecode $duration = NULL) {
        $this->start = $start;
        $this->duration = $duration;
    }

    /**
    * Get duration.
    *
    * @return Timecode
    */
    public function getDuration() {
        return $this->duration;
    }

    /**
    * Apply Flag.
    *
    * @return Array
    */
    public function apply() {
        $commands = [
            '-ss' => (string) $this->start
        ];

        if (!empty($this->duration)) {
            $commands['-t'] = (string) $this->duration;
        }

        return $commands;
    }
}
