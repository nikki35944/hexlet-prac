<?php

function makeSegment($point1, $point2)
{
    return ['beginPoint' => $point1, 'endPoint' => $point2];
}

function getAngle($point)
{
    return $point['angle'];
}

function getRadius($point)
{
    return $point['radius'];
}

function getX($point)
{
    return getRadius($point) * cos(getAngle($point));
}

function getY($point)
{
    return getRadius($point) * sin(getAngle($point));
}