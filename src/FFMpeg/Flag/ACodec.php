<?php

namespace FFMpeg\Flag;

class ACodec extends Flag
{
    /*
    * ACodec
    *
    */
    public function __construct($acodec = '') {
        $this->acodec = $acodec;
    }

    /**
    * Apply Flag.
    *
    * @return Array
    */
    public function apply() {
        return ['-c:a' => $this->acodec];
    }
}
