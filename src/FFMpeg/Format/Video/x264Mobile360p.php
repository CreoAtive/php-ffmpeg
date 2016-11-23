<?php

namespace FFMpeg\Format\Video;

use FFMpeg\Flag\Flag;
use FFMpeg\Flag\CRF;

class x264Mobile360p extends x264
{
    /*
    * x264 @ 720p
    *
    */
    public function __construct() {
        parent::__construct();

        $max_width = 640;
        $max_height = 360;

        $this->addFlag(new Flag('-filter:v', 'scale=iw*sar:ih,scale="\'if(gt(iw,'.$max_width.'),-1,trunc(iw/2)*2)\':\'if(gt(ih,'.$max_height.'),'.$max_height.',trunc(ih/2)*2)\'"'));

        $this->name = 'x264Mobile360p';
    }
}
