<?php

namespace Web\Testing\SideEffects\Implementations;

use Faker\Factory;

function buildUserWrong3()
{
    $faker = Factory::create();
    $defaultData = [
        'email' => $faker->email(),
        'firstName' => $faker->firstName(),
        'lastName' => $faker->lastName()
    ];
    return $defaultData;
}
