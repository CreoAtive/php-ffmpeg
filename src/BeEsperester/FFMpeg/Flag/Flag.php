<?php

namespace Beesperester\FFMpeg\Flag;

class Flag implements FlagInterface
{
    private $flag, $value;

    public function __construct($flag = '', $value = '') {
        $this->flag = $flag;
        $this->value = $value;
    }

    /**
    * Apply Flag.
    *
    * @return Array
    */
    public function apply() {
        return [$this->flag => $this->value];
    }
}
