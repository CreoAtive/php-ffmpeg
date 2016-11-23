<?php

namespace Beesperester\FFMpeg\Format\Video;

use Beesperester\FFMpeg\Flag\Flag;
use Beesperester\FFMpeg\Flag\CRF;
use Beesperester\FFMpeg\Flag\Preset;

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
