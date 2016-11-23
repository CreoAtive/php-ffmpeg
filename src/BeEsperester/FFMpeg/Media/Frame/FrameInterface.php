<?php

namespace Beesperester\FFMpeg\Media\Frame;

use Beesperester\Fileresource\Fileresource;

use Beesperester\FFMpeg\Coordinate\Timecode;
use Beesperester\FFMpeg\Driver\FFMpegDriver;
use Beesperester\FFMpeg\Driver\FFProbeDriver;
use Beesperester\FFMpeg\Media\MediaInterface;

interface FrameInterface extends MediaInterface
{
    /**
    * FrameInterface.
    *
    */
    public function __construct(Fileresource $fileresource, Timecode $timecode, FFMpegDriver $ffmpeg_driver, FFProbeDriver $ffprobe_driver);

    /**
    * Save Framefile.
    *
    * @var Fileresource $output_fileresource
    * @var Boolean $accurate
    */
    public function save(Fileresource $output_fileresource);
}
