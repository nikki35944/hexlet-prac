<?php

function getIn(array $array, array $keys)
{

    $current = $array;
    foreach ($keys as $key) {
        if (!is_array($current) || !array_key_exists($key, $current)) {
            return null;
        }
        $current = $current[$key];
        var_dump($current);
    }

    return $current;

}


$data = [
    'user' => 'ubuntu',
    'hosts' => [
        ['name' => 'web1'],
        ['name' => 'web2', null => 3, 'active' => false]
    ]
];

echo '<pre>';
var_dump(getIn($data, ['undefined'])); // null
var_dump(getIn($data, ['user'])); // 'ubuntu'
var_dump(getIn($data, ['user', 'ubuntu'])); // null
var_dump(getIn($data, ['hosts', 1, 'name'])); // 'web2'
var_dump(getIn($data, ['hosts', 0])); // ['name' => 'web1']
var_dump(getIn($data, ['hosts', 1, null])); // 3
var_dump(getIn($data, ['hosts', 1, 'active'])); // false
echo '</pre>';