<?php

namespace FFMpeg\Media\Video;

use Fileresource\Fileresource;

use FFMpeg\Coordinate\Timecode;
use FFMpeg\Driver\FFMpegDriver;
use FFMpeg\Driver\FFProbeDriver;
use FFMpeg\Format\FormatInterface;
use FFMpeg\Media\MediaInterface;

interface VideoInterface extends MediaInterface {
    /**
    * VideoInterface.
    *
    */
    public function __construct(Fileresource $fileresource, FFMpegDriver $ffmpeg_driver, FFProbeDriver $ffprobe_driver);

    /**
    * Get duration.
    *
    * @return Timecode
    */
    public function getDuration();

    /**
    * Set duration.
    *
    * @return Video
    */
    public function setDuration(Timecode $timecode);

    /**
    * Get frames per second.
    *
    * @return Int
    */
    public function getFps();

    /**
    * Get width.
    *
    * @return Int
    */
    public function getWidth();

    /**
    * Get height.
    *
    * @return Int
    */
    public function getHeight();

    /**
    * Get audio codec.
    *
    * @return String
    */
    public function getAudioCodec();

    /**
    * Get video codec.
    *
    * @return String
    */
    public function getVideoCodec();

    /**
    * Get number of frames.
    *
    * @return Int
    */
    public function getFrames();

    /**
    * Save Videofile.
    *
    * @var Fileresource $output_fileresource
    */
    public function save(Fileresource $output_fileresource, FormatInterface $format = NULL);
}
