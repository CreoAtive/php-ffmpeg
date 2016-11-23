<?php

namespace FFMpeg;

use FFMpeg\Driver\FFProbeDriver;
use Fileresource;

class FFProbe {
    /**
    * Create a new FFMpeg Video instance.
    *
    * @return Video
    */
    public static function video(Fileresource $fileresource) {
        return FFProbeDriver::create($fileresource);
    }
}