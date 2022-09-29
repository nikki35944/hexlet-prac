<?php

function takeOldest($array, $count = 1)
{

    $result = $array;

    $cmp = function ($a, $b) {
        if ($a['birthday'] === $b['birthday']) {
            return 0;
        }
        return $a['birthday'] > $b['birthday'] ? 1 : -1;
    };

    usort($result, $cmp);

    $result = array_slice($result, 0, $count);



    return $result;
}
// END


$users = [
    ['name' => 'Tirion', 'birthday' => '1988-11-19'],
    ['name' => 'Sam', 'birthday' => '1999-11-22'],
    ['name' => 'Rob', 'birthday' => '1975-01-11'],
    ['name' => 'Sansa', 'birthday' => '2001-03-20'],
    ['name' => 'Tisha', 'birthday' => '1992-02-27']
];


var_dump(takeOldest($users, 2));