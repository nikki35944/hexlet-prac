<?php

function dup($point)
{

    $newPoint = new \App\Point();
    $newPoint->x = $point->x;
    $newPoint->y = $point->y;

    return $newPoint;
}