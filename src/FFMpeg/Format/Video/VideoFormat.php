<?php

namespace FFMpeg\Format\Video;

use FFMpeg\Flag\ACodec;
use FFMpeg\Flag\VCodec;
use FFMpeg\Format\Format;

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
