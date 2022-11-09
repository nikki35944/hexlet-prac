<?php

class Time
{
    private $h;
    private $m;

    // BEGIN (write your solution here)
    public static function fromString($time)
    {
        $parts = explode(':', $time);
        $hours = $parts[0];
        $minutes = $parts[1];
        return new self($hours, $minutes);
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