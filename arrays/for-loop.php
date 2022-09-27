<?php


function addPrefix($arr, $prefix)
{
    $result = [];
    for ($i = 0; $i <= count($arr) - 1; $i++) {
        $result[] .= "{$prefix} {$arr[$i]}";
    }
    return $result;
}


$names = ['john', 'smith', 'karl'];

$newNames = addPrefix($names, 'Mr');
print_r($newNames);
// => ['Mr john', 'Mr smith', 'Mr karl'];
