<?php

class Timer
{
    public const SEC_PER_MIN = 60;

    // BEGIN (write your solution here)
    public const SEC_PER_HOUR = 3600;
    public $seconds;
    public $secondsCount;

    public function __construct($seconds, $minutes = null, $hours = null)
    {
        $this->seconds = $seconds;

        $this->secondsCount = $seconds + ($minutes * self::SEC_PER_MIN) + ($hours * self::SEC_PER_HOUR);
    }
    // END

    public function getLeftSeconds()
    {
        return $this->secondsCount;
    }

    public function tick()
    {
        $this->secondsCount--;
    }
}