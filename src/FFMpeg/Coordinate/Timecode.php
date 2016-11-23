<?php

namespace FFMpeg\Coordinate;

class TimeCode
{
    protected $hours, $minutes, $seconds, $frames;

    public function __construct($hours = 0, $minutes = 0, $seconds = 0, $frames = 0) {
        $this->hours = $hours;
        $this->minutes = $minutes;
        $this->seconds = $seconds;
        $this->frames = $frames;
    }

    /**
    * Get formatted Timecode string.
    *
    * @return String
    */
    public function __toString() {
        return sprintf('%02d:%02d:%02d.%02d', $this->hours, $this->minutes, $this->seconds, $this->frames);
    }

    /**
    * Get Timecode in seconds.
    *
    * @return Int
    */
    public function toSeconds() {
        return $this->seconds + ($this->minutes * 60) + ($this->hours * 3600);
    }

    /**
    * Creates Timecode from seconds.
    *
    * @var Float $quantity
    * @return TimeCode
    */
    public static function fromSeconds($quantity) {
        $minutes = $hours = $frames = 0;

        $frames = round(100 * ($quantity - floor($quantity)));
        $seconds = floor($quantity);

        if ($seconds > 59) {
            $minutes = floor($seconds / 60);
            $seconds = $seconds % 60;
        }
        if ($minutes > 59) {
            $hours = floor($minutes / 60);
            $minutes = $minutes % 60;
        }

        return new static($hours, $minutes, $seconds, $frames);
    }

    /**
    * Creates Timecode from minutes.
    *
    * @var Float $quantity
    * @return TimeCode
    */
    public static function fromMinutes($quantity) {
        return self::fromSeconds($quantity * 60);
    }

    /**
    * Creates Timecode from minutes.
    *
    * @var Float $quantity
    * @return TimeCode
    */
    public static function fromHours($quantity) {
        return self::fromSeconds($quantity * 60 * 60);
    }

    /**
    * Creates Timecode from string 00:00:00.0.
    *
    * @var String $time
    * @return TimeCode
    */
    public static function fromString($time) {
        $pattern = '/^(?<hours>\d{2,}):(?<minutes>[0-5][0-9]):(?<seconds>[0-5][0-9])\.?(?<frames>\d+)$/';

        if (preg_match($pattern, $time, $matches)) {
            return new static($matches['hours'], $matches['minutes'], $matches['seconds'], $matches['frames']);
        } else {
            throw new \Exception('Time must be formatted like this 00:00:00.0');
        }
    }
}
