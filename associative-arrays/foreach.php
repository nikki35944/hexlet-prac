<?php

function pick(array $array, array $keys): array
{

    $result = [];

    foreach ($keys as $key) {
        if (array_key_exists($key, $array)) {
            $result[$key] = $array[$key];
        }
    }

    return $result;
}

echo '<pre>';

$data = [
    'user' => 'ubuntu',
    'cores' => 4,
    'os' => 'linux',
    'null' => null
];

var_dump(pick($data, ['user']));       // → ['user' => 'ubuntu']
var_dump(pick($data, ['user', 'os'])); // → ['user' => 'ubuntu', 'os' => 'linux']
var_dump(pick($data, []));             // → []
var_dump(pick($data, ['none']));       // → []
var_dump(pick($data, ['null']));        // → ['null' => null]

echo '</pre>';