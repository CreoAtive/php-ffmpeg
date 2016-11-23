<?php

namespace BeEsperester\FFMpeg\Media\Frame;

use Fileresource\Fileresource;

use BeEsperester\FFMpeg\Coordinate\Timecode;
use BeEsperester\FFMpeg\Driver\FFMpegDriver;
use BeEsperester\FFMpeg\Driver\FFProbeDriver;
use BeEsperester\FFMpeg\Media\MediaInterface;

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
