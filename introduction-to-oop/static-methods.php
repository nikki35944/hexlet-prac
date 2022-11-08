<?php

class Time
{
    private $h;
    private $m;

    // BEGIN (write your solution here)
    public static function fromString($string)
    {
        $parts = explode(':', $string);
        $this->h = $parts[0];
        $this->m = $parts[1];
    }
    // END

    public function __construct($h, $m)
    {
        $this->h = $h;
        $this->m = $m;
    }

    public function __toString()
    {
        return "{$this->h}:{$this->m}";
    }
}

$time = Time::fromString('10:23');
echo $time;