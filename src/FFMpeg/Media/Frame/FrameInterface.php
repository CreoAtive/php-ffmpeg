<?php

namespace FFMpeg\Media\Frame;

use Fileresource\Fileresource;

use FFMpeg\Coordinate\Timecode;
use FFMpeg\Driver\FFMpegDriver;
use FFMpeg\Driver\FFProbeDriver;
use FFMpeg\Media\MediaInterface;

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
