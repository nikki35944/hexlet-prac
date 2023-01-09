<?php

namespace Web\Testing\SideEffects\Implementations;

use Faker\Factory;

function buildUserWrong2($data = [])
{
    $faker = Factory::create();
    $faker->seed(123);
    $defaultData = [
        'email' => $faker->email(),
        'firstName' => $faker->firstName(),
        'lastName' => $faker->lastName()
    ];
    return array_merge($defaultData, $data);
}
