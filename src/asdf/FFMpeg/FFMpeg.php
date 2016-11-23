<?php

namespace Beesperester\FFMpeg;

use Beesperester\Fileresource\Fileresource;

use Beesperester\FFMpeg\Coordinate\Timecode;
use Beesperester\FFMpeg\Driver\FFMpegDriver;
use Beesperester\FFMpeg\Driver\FFProbeDriver;
use Beesperester\FFMpeg\Media\Video\Video;
use Beesperester\FFMpeg\Media\Frame\Frame;

class FFMpeg
{
    /**
    * Create a new FFMpeg Video instance.
    *
    * @return Video
    */
    public static function video(Fileresource $fileresource) {
        return new Video($fileresource, FFMpegDriver::create($fileresource), FFProbeDriver::create($fileresource));
    }

    /**
    * Create a new FFMpeg Frame instance.
    *
    * @return Frame
    */
    public static function frame(Fileresource $fileresource, Timecode $timecode) {
        return new Frame($fileresource, $timecode, FFMpegDriver::create($fileresource), FFProbeDriver::create($fileresource));
    }
}
