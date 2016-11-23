<?php

namespace BeEsperester\FFMpeg\Format;

use BeEsperester\FFMpeg\Flag\FlagInterface;

use Closure;

interface FormatInterface
{

    /**
    * To string.
    *
    * @return string
    */
    public function __toString();

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
    * Get events.
    *
    * @return Array
    */
    public function getEvents();

    /**
    * Get flags.
    *
    * @return Array
    */
    public function getFlags();

    /**
    * Add event.
    *
    */
    public function addEvent($event, Closure $callback);
}
