<?php

function apply(array $arr, string $operationName, int $index = null, $value = null): array
{
    // BEGIN (write your solution here)
    switch ($operationName) :
        case 'reset':
            $arr = [];
            break;
        case 'remove':
            unset($arr[$index]);
            break;
        case 'change':
            $arr[$index] = $value;
            break;
        default:
            echo 'no such operation';
    endswitch;
    return $arr;
    // END
}


$cities = ['moscow', 'london', 'berlin', 'porto'];
// Сброс в пустой массив
echo '<pre>';
var_dump(apply($cities, 'reset'));
echo '</pre>';// []

// удаление значения по индексу
; // ['moscow', 'berlin', 'porto']
echo '<pre>';
var_dump(apply($cities, 'remove', 1));
echo '</pre>';


// изменение значения по индексу
echo '<pre>';
var_dump(apply($cities, 'change', 0, 'miami'));
echo '</pre>';
 // ['miami', 'london', 'berlin', 'porto']
