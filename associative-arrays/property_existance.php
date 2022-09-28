<?php

function countWords($text)
{

    if (empty($text)) {
        return [];
    }

    $text = mb_strtolower($text);
    $wordsArray = explode(' ', $text);


    $result = [];
    foreach ($wordsArray as $word) {
        if (array_key_exists($word, $result)) {
            $result[$word] += 1;
        } else {
            $result[$word] = 1;
        }
    }

    return $result;
}


echo '<pre>';
// Если предложение пустое, то возвращается пустой объект
var_dump(countWords(''));
// []

$text1 = 'one two three two ONE one wow';
var_dump(countWords($text1));
// [
//     'one' => 3,
//     'two' => 2,
//     'three' => 1,
//     'wow' => 1
// ]

$text2 = 'another one sentence with strange Words words';
var_dump(countWords($text2));
// [
//     'another' => 1,
//     'one' =>  1,
//     'sentence' => 1,
//     'with' => 1,
//     'strange' => 1,
//     'words' => 2
// ]

echo '</pre>';