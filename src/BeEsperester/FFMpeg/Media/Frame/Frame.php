<?php

namespace BeEsperester\FFMpeg\Media\Frame;

use Fileresource\Fileresource;

use BeEsperester\FFMpeg\Coordinate\Timecode;
use BeEsperester\FFMpeg\Driver\FFMpegDriver;
use BeEsperester\FFMpeg\Driver\FFProbeDriver;
use BeEsperester\FFMpeg\Media\Media;

class Frame extends Media implements FrameInterface
{
    /**
    * FFMpeg Frame.
    *
    */
    public function __construct(Fileresource $fileresource, Timecode $timecode, FFMpegDriver $ffmpeg_driver, FFProbeDriver $ffprobe_driver) {
        parent::__construct($fileresource);

        $this->timecode = $timecode;

        $this->ffmpeg_driver = $ffmpeg_driver;
        $this->ffprobe_driver = $ffprobe_driver;

        $this->width = $this->ffprobe_driver->getWidth();
        $this->height = $this->ffprobe_driver->getHeight();
    }

    use FrameTraits;

    /**
    * Save Framefile.
    *
    * @var Fileresource $output_fileresource
    * @var Boolean $accurate
    */
    public function save(Fileresource $output_fileresource) {
        $commands = [
            '-ss ' => (string) $this->timecode,
            '-i ' => (string) $this->fileresource,
            '-vframes' => '1',
            '-f' => 'image2'
        ];

        # merge video flags
        foreach($this->flags as $flag) {
            $commands = array_merge($commands, $flag->apply());
        }

        # append output filepath
        $commands['-y'] = (string) $output_fileresource;

        $this->ffmpeg_driver->exec($commands);
    }
}
