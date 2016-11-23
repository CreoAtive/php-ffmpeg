<?php

namespace BeEsperester\FFMpeg\Driver;

use Closure;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

use Fileresource\Fileresource;

class Driver implements DriverInterface
{
    protected $driver = '';
    protected $fileresource;

    /**
    * Driver.
    *
    */
    public function __construct(Fileresource $fileresource) {
        $this->fileresource = $fileresource;
    }

    /**
    * Compile command.
    *
    * @var Array $commands
    * @return string
    */
    public function compileCommand(Array $commands = []) {
        return implode(
            ' ',
            array_map(
                function($key, $value) {
                    return implode(' ', array_filter([$key, $value]));
                },
                array_keys($commands),
                array_values($commands)
            )
        );
    }

    /**
    * Execute Process.
    *
    * @var Fileresource $fileresource
    * @var Array $commands
    * @var Array $events
    */
    public function exec(Array $commands = [], Array $events = [], Closure $callback = NULL) {
        #array_unshift($commands, );

        $commands = array_merge([$this->driver => ''], $commands);

        $command_string = $this->compileCommand($commands);

        $process = new Process($command_string);

        $process->setTimeout(0);

        $process->run(function($type, $buffer) use ($callback) {
            if ($callback) {
                $callback($type, $buffer);
            }
        });

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        if ($process->isSuccessful()) {
            if (array_key_exists('success', $events)) {
                $events['success']();
            }
        } else {
            if (array_key_exists('failure', $events)) {
                $events['failure']();
            }
        }

        if (array_key_exists('finished', $events)) {
            $events['finished']();
        }

        return [
            'output' => $process->getOutput(),
            'error' => $process->getErrorOutput()
        ];
    }

    /**
    * Create new driver from fileresource.
    *
    * @var Fileresource $fileresource
    * @return Driver
    */
    public static function create(Fileresource $fileresource) {
        return new static($fileresource);
    }
}
