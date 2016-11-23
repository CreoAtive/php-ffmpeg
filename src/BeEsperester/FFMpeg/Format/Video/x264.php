<?php

namespace BeEsperester\FFMpeg\Format\Video;

use BeEsperester\FFMpeg\Flag\Flag;
use BeEsperester\FFMpeg\Flag\CRF;
use BeEsperester\FFMpeg\Flag\Preset;

class x264 extends VideoFormat
{
    /*
    * X264
    *
    */
    public function __construct() {
        parent::__construct('libx264', 'libfaac');

        $this->addFlags([
            new CRF(18),
            new Preset('slow'),
            new Flag('-movflags'),
            new Flag('+faststart')
        ]);

        $this->name = 'x264';
    }
}
