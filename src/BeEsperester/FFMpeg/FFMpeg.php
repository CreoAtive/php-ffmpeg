<?php

namespace BeEsperester\FFMpeg;

use Fileresource\Fileresource;

use BeEsperester\FFMpeg\Coordinate\Timecode;
use BeEsperester\FFMpeg\Driver\FFMpegDriver;
use BeEsperester\FFMpeg\Driver\FFProbeDriver;
use BeEsperester\FFMpeg\Media\Video\Video;
use BeEsperester\FFMpeg\Media\Frame\Frame;

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
