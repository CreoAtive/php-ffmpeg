<?php

namespace FFMpeg;

use Fileresource\Fileresource;

use FFMpeg\Coordinate\Timecode;
use FFMpeg\Driver\FFMpegDriver;
use FFMpeg\Driver\FFProbeDriver;
use FFMpeg\Media\Video\Video;
use FFMpeg\Media\Frame\Frame;

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
