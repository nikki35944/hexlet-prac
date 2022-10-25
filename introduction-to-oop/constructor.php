<?php

class Segment
{
    public $beginPoint;
    public $endPoint;

    public function __construct($beginPoint, $endPoint)
    {
        $this->beginPoint = $beginPoint;
        $this->endPoint = $endPoint;
    }
}

function reverse($segment)
{

    $beginPoint = $segment->beginPoint;
    $endPoint = $segment->endPoint;
    $newEndPoint = new Point($beginPoint->x, $beginPoint->y);
    $newBeginPoint = new Point($endPoint->x, $endPoint->y);

    return new Segment($newBeginPoint, $newEndPoint);
}