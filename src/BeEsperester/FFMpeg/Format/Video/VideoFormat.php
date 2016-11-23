<?php

namespace BeEsperester\FFMpeg\Format\Video;

use BeEsperester\FFMpeg\Flag\ACodec;
use BeEsperester\FFMpeg\Flag\VCodec;
use BeEsperester\FFMpeg\Format\Format;

class VideoFormat extends Format implements VideoFormatInterface
{
    /*
    * VideoFormat
    *
    */
    public function __construct($vcodec = '', $acodec = '') {
        parent::__construct();

        $this->addFlag(new VCodec($vcodec));
        $this->addFlag(new ACodec($acodec));

        $this->name = 'VideoFormat';
    }
}
