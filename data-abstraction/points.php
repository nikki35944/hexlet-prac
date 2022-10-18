<?php
function calculateDistance($point1, $point2)
{
    $x = pow($point2[0] - $point1[0], 2);
    $y = pow($point2[1] - $point1[1], 2);

    $sum = $x + $y;

    return sqrt($sum);
}