<?php

function flatten($array)
{
    if (empty($array)) {
        return [];
    }

    $result = [];

    foreach ($array as $item) {
        if (is_array($item)) {
            $spread_item = [...$item];
            $result = array_merge($result, $spread_item);
        } else {
            $result[] = $item;
        }
    }

    return $result;
}


var_dump(flatten([])); // []
var_dump(flatten([1, [3, 2], 9])); // [1, 3, 2, 9]
var_dump(flatten([1, [[2], [3]], [9]])); // [1, [2], [3], 9]
