<?php

namespace FFMpeg\Driver;

use Fileresource\Fileresource;

use FFMpeg\Coordinate\Timecode;
use FFMpeg\Media\Video\VideoTraits;

use Closure;

class FFProbeDriver extends Driver
{
    protected $driver = 'ffprobe';
    private $width, $height, $fps, $duration, $vcodec, $acodec;

    /**
    * Construct FFProbeDriver.
    *
    * @var Fileresource $fileresource
    */
    public function __construct(Fileresource $fileresource) {
        parent::__construct($fileresource);

        $this->width = 0;
        $this->height = 0;
        $this->fps = 0;
        $this->duration = Timecode::fromSeconds(0);
        $this->vcodec = '';
        $this->acodec = '';

        $this->probe();
    }

    use VideoTraits;

    /**
    * Probe video file.
    *
    */
    public function probe() {
        $commands = [
            (string) $this->fileresource => ''
        ];

        $output = $this->exec($commands);

        $buffer = $output['error'];

        # get width and height
        if (preg_match('/(?<width>\d{2,})x(?<height>\d{2,})/', $buffer, $width_height_matches)) {
            $this->width = $width_height_matches['width'];
            $this->height = $width_height_matches['height'];
        }

        # get fps
        if (preg_match('/(?<fps>[\d\.]+)\sfps/', $buffer, $fps_matches)) {
            $this->fps = $fps_matches['fps'];
        }

        # get duration
        if (preg_match('/Duration\: (?<duration>[0-9\:\.]+),/', $buffer, $duration_matches)) {
            $this->duration = Timecode::fromString($duration_matches['duration']);
        }

        # get video codec
        if (preg_match('/Video:\s(?<vcodec>\S+)/', $buffer, $video_codec_matches)) {
            $this->vcodec = $video_codec_matches['vcodec'];
        }

        # get video codec
        if (preg_match('/Audio:\s(?<acodec>\S+)/', $buffer, $audio_codec_matches)) {
            $this->acodec = $audio_codec_matches['acodec'];
        }
    }
}
