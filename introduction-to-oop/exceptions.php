<?php

function json_decode($json, $assoc = false)
{
    // BEGIN (write your solution here)
    $data = \json_decode($json, $assoc);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new \Exception(json_last_error_msg());
    }
    return $data;
    // END
}