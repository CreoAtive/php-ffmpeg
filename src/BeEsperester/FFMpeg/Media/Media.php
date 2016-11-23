<?php

namespace BeEsperester\FFMpeg\Media;

use Fileresource\Fileresource;

use BeEsperester\FFMpeg\Flag\FlagInterface;

class Media implements MediaInterface
{
    protected $flags;
    protected $fileresource;
    /**
    * Media.
    *
    */
    public function __construct(Fileresource $fileresource) {
        $this->fileresource = $fileresource;
        $this->flags = [];
    }

    /**
    * Add Flag.
    *
    * @var FlagInterface $flag
    * @return Video
    */
    public function addFlag(FlagInterface $flag) {
        #$this->flags = array_merge($this->flags, $flag);
        $this->flags[] = $flag;

        return $this;
    }

    /**
    * Add Flags.
    *
    * @var Array $flags
    */
    public function addFlags(Array $flags) {
        foreach ($flags as $flag) {
            $this->addFlag($flag);
        }

        return $this;
    }

    /**
    * Get details.
    *
    * @return Array
    */
    public function getDetails() {
        return [];
    }

    /**
    * Save Mediafile.
    *
    * @var Fileresource $output_fileresource
    */
    public function save(Fileresource $output_fileresource) {}
}
