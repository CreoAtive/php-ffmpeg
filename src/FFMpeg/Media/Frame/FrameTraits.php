<?php

namespace FFMpeg\Media\Frame;

trait FrameTraits
{
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
    * Get details.
    *
    * @return Array
    */
    public function getDetails() {
        return [
            'width' => $this->getWidth(),
            'height' => $this->getHeight()
        ];
    }
}
