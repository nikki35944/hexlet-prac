<?php

function run(string $text)
{
    // BEGIN (write your solution here)
    $last = function ($text) {
        if ($text == '') return null;

        $lastChar = strlen($text) - 1;
        return $text[$lastChar];
    };
    // END

    return $last($text);
}


echo '<pre>';
run('');     // null
run('0');    // 0
run('210');  // 0
run('pow');  // w
run('kids'); // s

echo '<pre>';