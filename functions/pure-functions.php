<?php

function isPrime($number)
{
    if ($number === 1 || $number === 0 || $number < 0) {
        return false;
    }

    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i === 0)
            return false;
    }
    return true;
}

function sayPrimeOrNot($number)
{

    $text = isPrime($number) ? 'yes' : 'no';
    print_r($text);
}

sayPrimeOrNot(5); // yes
sayPrimeOrNot(4); // no
sayPrimeOrNot(8);