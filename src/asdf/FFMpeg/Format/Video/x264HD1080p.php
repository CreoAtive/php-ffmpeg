<?php

namespace Beesperester\FFMpeg\Format\Video;

use Beesperester\FFMpeg\Flag\Flag;
use Beesperester\FFMpeg\Flag\CRF;

class x264HD1080p extends x264
{
    /*
    * x264 @ 1080p
    *
    */
    public function __construct() {
        parent::__construct();

        $max_width = 1920;
        $max_height = 1080;

        $size = new Flag('-filter:v', 'scale=iw*sar:ih,scale="\'if(gt(iw,'.$max_width.'),-1,trunc(iw/2)*2)\':\'if(gt(ih,'.$max_height.'),'.$max_height.',trunc(ih/2)*2)\'"');

        $this->addFlags([
            new CRF(23),
            $size
        ]);

        $this->name = 'x264HD1080p';
    }
}
