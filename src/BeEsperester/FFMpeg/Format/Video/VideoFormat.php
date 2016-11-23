<?php

namespace Beesperester\FFMpeg\Format\Video;

use Beesperester\FFMpeg\Flag\ACodec;
use Beesperester\FFMpeg\Flag\VCodec;
use Beesperester\FFMpeg\Format\Format;

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
