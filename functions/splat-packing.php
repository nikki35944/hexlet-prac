<?php


function average(...$numbers)
{
    if (empty($numbers)) {
        return null;
    }
    $count = count($numbers);

    $sum = 0;
    foreach ($numbers as $number) {
        $sum += $number;
    }

    return $sum / $count;
}

echo '<pre>';
average(0); // 0
average(0, 10); // 5
average(-3, 4, 2, 10); // 3.25
average(); // null
echo '</pre>';