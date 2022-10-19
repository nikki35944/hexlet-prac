<?php
function removeFirstLevel($tree)
{
    $nodes = array_filter($tree, fn($node) => is_array($node));
    return array_merge(...$nodes);
}


function removeFirstLevel1($array)
{
    $result = [];
    foreach ($array as $inner) {
        if (is_array($inner)) {
            foreach ($inner as $value) {
                $result[] = $value;
            }
        }
    }
    return $result;
}