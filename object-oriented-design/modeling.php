<?php

// BEGIN (write your solution here)
class Url
{
    private const DOMAINS = [
        'yandex.ru',
        'google.com'
    ];

    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }
    public function getScheme()
    {
        $parts = explode('://', $this->url);
        return $parts[0];
    }
    public function getHostName()
    {
        foreach (self::DOMAINS as $domain) {
            if (strpos($this->url, $domain)) {
                return $domain;
            }
        }
    }
    public function getQueryParams()
    {
        $parts = explode('?', $this->url);
        $params = explode('&', $parts[1]);

        $result = [];
        foreach ($params as $param) {
            $param_parts = explode('=', $param);
            $result[$param_parts[0]] = $param_parts[1];
        }
        return $result;
    }
    public function getQueryParam($key, $default = null)
    {
        $arrayParams = $this->getQueryParams();

        return array_key_exists($key, $arrayParams) ? $arrayParams[$key] : $default;
    }
    public function equals(Url $url)
    {
        return $this == $url;
    }
}
// END

$url = new Url('http://yandex.ru:80?key=value&key2=value2');
$url2 = new Url('https://google.com:80?a=b&c=d&lala=value');
$url3 = new Url('http://yandex.ru:80?key=value&key2=value2');
dump($url->equals($url2));
// dump($url2->getQueryParams());