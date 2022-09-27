<?php


function getDomainInfo($sting)
{
    $domainInfo = [];

    $domainParts = explode('://', $sting);
    $scheme = $domainParts[array_key_first($domainParts)];
    $name = $domainParts[array_key_last($domainParts)];

    ($scheme !== 'http' && $scheme !== 'https') ? $domainInfo['scheme'] = 'http' : $domainInfo['scheme'] = $scheme;
    $domainInfo['name'] = $name;

    return $domainInfo;
}


echo  '<pre>';
// Если домен передан без указания протокола,
// то по умолчанию берется http
var_dump(getDomainInfo('yandex.ru'));
// [
//     'scheme' => 'http',
//     'name' => 'yandex.ru'
// ]

var_dump(getDomainInfo('https://hexlet.io'));
// [
//     'scheme' => 'https',
//     'name' => 'hexlet.io'
// ]

var_dump(getDomainInfo('http://google.com'));
// [
//     'scheme' => 'http',
//     'name' => 'google.com'
// ]

echo '</pre>';