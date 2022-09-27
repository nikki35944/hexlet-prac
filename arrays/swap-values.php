<?php

function swap($array, $index)
{
    if (array_key_exists($index - 1, $array) && array_key_exists($index + 1, $array)){
        $temp = $array[$index + 1];
        $array[$index + 1] = $array[$index - 1];
        $array[$index - 1] = $temp;

        return $array;
    }

    return $array;
}

$names = ['john', 'smith', 'karl'];

$result = swap($names, 1);
print_r($result); // => ['karl', 'smith', 'john']

$result = swap($names, 2);
print_r($result); // => ['john', 'smith', 'karl']

$result = swap($names, 0);
print_r($result); // => ['john', 'smith', 'karl']
