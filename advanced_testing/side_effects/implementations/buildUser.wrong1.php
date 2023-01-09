<?php

namespace Web\Testing\SideEffects\Implementations;

use Faker\Factory;

function buildUserWrong1($data = [])
{
    $faker = Factory::create();
    $defaultData = [
        'firstName' => $faker->firstName()
    ];
    return array_merge($defaultData, $data);
}
