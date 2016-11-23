<?php

namespace Beesperester\FFMpeg\Format;

use Beesperester\FFMpeg\Flag\FlagInterface;

use Closure;

class Format implements FormatInterface
{
    private $events, $flags, $name;

    /**
    * Format.
    *
    */
    public function __construct() {
        $this->events = [];
        $this->flags = [];
        $this->name = 'Format';
    }

    /**
    * To string.
    *
    * @return string
    */
    public function __toString() {
        return $this->name;
    }

    /**
    * Add event.
    *
    * @var String $event
    * @var Closure $callback
    */
    public function addEvent($event, Closure $callback) {
        $this->events[$event] = $callback;

        return $this;
    }

    /**
    * Add Flag.
    *
    * @var FlagInterface $flag
    */
    public function addFlag(FlagInterface $flag) {
        /*$collection = collect($this->flags);

        $collection = $collection->filter(function($current_flag) use($flag) {
            if (get_class($current_flag) == 'Flag') {
                return True;
            }

            return (get_class($current_flag) != get_class($flag));
        });

        $this->flags = array_values($collection->toArray());*/
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
    * Get events.
    *
    * @return Array
    */
    public function getEvents() {
        return $this->events;
    }

    /**
    * Get flags.
    *
    * @return Array
    */
    public function getFlags() {
        return $this->flags;
    }
}
