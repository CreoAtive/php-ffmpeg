<?php

namespace BeEsperester\FFMpeg\Driver;

use Fileresource\Fileresource;

use Closure;

class FFMpegDriver extends Driver
{
    protected $driver = 'ffmpeg';

    /**
    * Execute Process.
    *
    * @var Fileresource $fileresource
    * @var Array $commands
    * @var Array $events
    */
    public function exec(Array $commands = [], Array $events = [], Closure $callback = NULL) {

        #$commands[] = '-i ' . (string) $this->fileresource;

        #echo $this->compileCommand($commands); die();

        return parent::exec($commands, $events, $callback);
    }
}
