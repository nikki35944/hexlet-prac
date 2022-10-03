<?php

function getGirlFriends($users)
{

    $friends = array_map(fn($user) => $user['friends'], $users);
    $friends = flatten($friends);

    $girlFriends = array_filter($friends, fn($friend) => $friend['gender'] == 'female');

    return array_values($girlFriends);
}

$users = [
    ['name' => 'Tirion', 'friends' => [
        ['name' => 'Mira', 'gender' => 'female'],
        ['name' => 'Ramsey', 'gender' => 'male']
    ]],
    ['name' => 'Bronn', 'friends' => []],
    ['name' => 'Sam', 'friends' => [
        ['name' => 'Aria', 'gender' => 'female'],
        ['name' => 'Keit', 'gender' => 'female']
    ]],
    ['name' => 'Rob', 'friends' => [
        ['name' => 'Taywin', 'gender' => 'male']
    ]],
];

getGirlFriends($users);