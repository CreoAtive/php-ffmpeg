<?php

namespace Beesperester\FFMpeg\Driver;

use Beesperester\Fileresource\Fileresource;

use Closure;

interface DriverInterface {
    /**
    * Compile command.
    *
    * @var Array $commands
    * @return string
    */
    public function compileCommand(Array $commands = []);

    /**
    * Execute Process.
    *
    * @var Fileresource $fileresource
    * @var Array $commands
    * @var Array $events
    */
    public function exec(Array $commands = [], Array $events = [], Closure $callback = NULL);

    /**
    * Create new driver from fileresource.
    *
    * @var Fileresource $fileresource
    * @return Driver
    */
    public static function create(Fileresource $fileresource);
}
