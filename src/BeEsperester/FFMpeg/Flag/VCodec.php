<?php

namespace BeEsperester\FFMpeg\Flag;

class VCodec extends Flag
{
    /*
    * VCodec
    *
    */
    public function __construct($vcodec = '') {
        $this->vcodec = $vcodec;
    }

    /**
    * Apply Flag.
    *
    * @return Array
    */
    public function apply() {
        return ['-c:v' => $this->vcodec];
    }
}
