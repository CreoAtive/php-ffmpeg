<?php

namespace Beesperester\FFMpeg\Media\Video;

trait VideoTraits
{
    /**
    * Get duration.
    *
    * @return Timecode
    */
    public function getDuration() {
        return $this->duration;
    }

    /**
    * Get frames per second.
    *
    * @return Int
    */
    public function getFps() {
        return $this->fps;
    }

    /**
    * Get width.
    *
    * @return Int
    */
    public function getWidth() {
        return $this->width;
    }

    /**
    * Get height.
    *
    * @return Int
    */
    public function getHeight() {
        return $this->height;
    }

    /**
    * Get audio codec.
    *
    * @return String
    */
    public function getAudioCodec() {
        return $this->acodec;
    }

    /**
    * Get video codec.
    *
    * @return String
    */
    public function getVideoCodec() {
        return $this->vcodec;
    }

    /**
    * Get number of frames.
    *
    * @return Int
    */
    public function getFrames() {
        return $this->getDuration()->toSeconds() * $this->getFps();
    }

    /**
    * Get details.
    *
    * @return Array
    */
    public function getDetails() {
        return [
            'duration' => (string) $this->getDuration(),
            'fps' => $this->getFps(),
            'width' => $this->getWidth(),
            'height' => $this->getHeight(),
            'acodec' => $this->getAudioCodec(),
            'vcodec' => $this->getVideoCodec(),
            'frames' => $this->getFrames()
        ];
    }
}
