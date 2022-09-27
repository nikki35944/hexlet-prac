<?php


function get(array $arr, int $index, $default = null)
{
    return array_key_exists($index, $arr) ? $arr[$index] : $arr[$index] = $default;

}


$cities = ['moscow', 'london', 'berlin', 'porto', null];

echo '<pre>';
var_dump(get($cities, 1));
echo '</pre>';// []


echo '<pre>';
var_dump(get($cities, 10, 'paris'));
echo '</pre>';


echo '<pre>';
var_dump(get($cities, 4));
echo '</pre>';

echo '<pre>';
var_dump(get($cities, 4, 'default'));
echo '</pre>';