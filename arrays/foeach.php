<?php

function isContinuousSequence($arr)
{
    if (!empty($arr) && count($arr) > 1) {
        $diffArray = [];
        for ($i = $arr[0]; $i <= end($arr); $i++) {
            $diffArray[] = $i;
        }
        return $arr == $diffArray;

    }

    return false;
}






var_dump(isContinuousSequence([10, 11, 12, 13]));     // true
var_dump(isContinuousSequence([10, 11, 12, 14, 15])); // false
var_dump(isContinuousSequence([1, 2, 2, 3]));         // false
var_dump(isContinuousSequence([]));                   // false
var_dump(isContinuousSequence([7]));