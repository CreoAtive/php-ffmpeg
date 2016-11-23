<?php

namespace Beesperester\FFMpeg\Media;

use Beesperester\Fileresource\Fileresource;

use Beesperester\FFMpeg\Flag\FlagInterface;

interface MediaInterface {
    /**
    * Add Flag.
    *
    * @var FlagInterface $flag
    */
    public function addFlag(FlagInterface $flag);

    /**
    * Add Flags.
    *
    * @var Array $flags
    */
    public function addFlags(Array $flags);

    /**
    * Get details.
    *
    * @return Array
    */
    public function getDetails();

    /**
    * Save Mediafile.
    *
    * @var Fileresource $output_fileresource
    */
    public function save(Fileresource $output_fileresource);
}
