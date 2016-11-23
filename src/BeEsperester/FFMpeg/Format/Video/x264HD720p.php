<?php

namespace BeEsperester\FFMpeg\Format\Video;

use BeEsperester\FFMpeg\Flag\Flag;

class x264HD720p extends x264
{
    /*
    * x264 @ 720p
    *
    */
    public function __construct() {
        parent::__construct();

        $max_width = 1280;
        $max_height = 720;

        $this->addFlag(new Flag('-filter:v', 'scale=iw*sar:ih,scale="\'if(gt(iw,'.$max_width.'),-1,trunc(iw/2)*2)\':\'if(gt(ih,'.$max_height.'),'.$max_height.',trunc(ih/2)*2)\'"'));

        $this->name = 'x264HD720p';
    }
}
