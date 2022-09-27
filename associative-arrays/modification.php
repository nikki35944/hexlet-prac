<?php


function normalize(&$lesson)
{
    $lesson['name'] = mb_convert_case($lesson['name'], MB_CASE_TITLE);
    $lesson['description'] = mb_strtolower($lesson['description']);

    return $lesson;
}

$lesson = [
    'name' => 'ДеструКТУРИЗАЦИЯ',
    'description' => 'каК удивитЬ друзей',
];
var_dump(normalize($lesson));
