<?php

namespace Beesperester\FFMpeg\Media\Video;

use Beesperester\Fileresource\Fileresource;

use Beesperester\FFMpeg\Coordinate\Timecode;
use Beesperester\FFMpeg\Driver\FFMpegDriver;
use Beesperester\FFMpeg\Driver\FFProbeDriver;
use Beesperester\FFMpeg\Flag\Clip;
use Beesperester\FFMpeg\Flag\FlagInterface;
use Beesperester\FFMpeg\Format\FormatInterface;
use Beesperester\FFMpeg\Media\Media;

class Video extends Media implements VideoInterface
{
    protected $ffmpeg_driver, $ffprobe_driver, $duration, $fps, $width, $height, $acodec, $vcodec;

    /**
    * FFMpeg Video.
    *
    */
    public function __construct(Fileresource $fileresource, FFMpegDriver $ffmpeg_driver, FFProbeDriver $ffprobe_driver) {
        parent::__construct($fileresource);

        $this->ffmpeg_driver = $ffmpeg_driver;
        $this->ffprobe_driver = $ffprobe_driver;

        $this->duration = $this->ffprobe_driver->getDuration();
        $this->fps = $this->ffprobe_driver->getFps();
        $this->width = $this->ffprobe_driver->getWidth();
        $this->height = $this->ffprobe_driver->getHeight();
        $this->acodec = $this->ffprobe_driver->getAudioCodec();
        $this->vcodec = $this->ffprobe_driver->getVideoCodec();
    }

    use VideoTraits;

    /**
    * Set duration.
    *
    * @return Video
    */
    public function setDuration(Timecode $timecode) {
        $this->duration = $timecode;

        return $this;
    }

    /**
    * Save Mediafile.
    *
    * @var Fileresource $output_fileresource
    */
    public function save(Fileresource $output_fileresource, FormatInterface $format = NULL) {
        $events = [];
        $commands = [
            '-i' => (string) $this->fileresource
        ];

        # merge video flags
        foreach ($this->flags as $flag) {
            if ($flag instanceof Clip) {
                # modify duration of video
                if (!empty($flag->getDuration())) {
                    $this->setDuration($flag->getDuration());
                } else {
                    $this->setDuration(Timecode::fromSeconds($this->getDuration()->toSeconds() - $flag->start->toSeconds()));
                }

                $clip_template = [
                    '-ss' => '',
                    '-t' => ''
                ];

                # prepend parameters to speed up seeking
                $commands = array_merge($clip_template, $commands);
            }

            $commands = array_merge($commands, $flag->apply());
        }

        # merge format
        if (!empty($format)) {
            # merge format flags
            foreach ($format->getFlags() as $flag) {
                $commands = array_merge($commands, $flag->apply());
            }

            # get listeners
            $events = $format->getEvents();
        }

        # append output filepath
        $commands['-y'] = (string) $output_fileresource;

        $video = $this;

        $callback = function($type, $buffer) use ($video, $events) {
            if (preg_match('/size=(?<size>.*?) time=(?<time>.*?) /', $buffer, $matches)) {
                $duration = Timecode::fromString($matches['time']);

                #echo $duration . ' / ' . $video->getDuration() . '<br/>';

                $progress = round($duration->toSeconds() / $video->getDuration()->toSeconds() * 100);

                if (array_key_exists('progress', $events)) {
                    $events['progress']($progress);
                }
            }
        };

        $this->ffmpeg_driver->exec($commands, $events, $callback);
    }
}
