<?php


function toStd($data)
{
    $std = new \stdClass();
    foreach ($data as $key => $value) {
        $std->$key = $value;
    }

    return $std;
}