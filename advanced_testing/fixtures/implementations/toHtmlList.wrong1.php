<?php

namespace Web\Testing\Fixtures\Implementations;

use Symfony\Component\Yaml\Yaml;

function toHtmlListWrong1($filepath)
{
    $parsers = [
        'json' => fn ($content) => json_decode($content, true),
        'yaml' => fn ($content) => Yaml::parse($content),
        'csv' => fn () => []
    ];

    $content = file_get_contents($filepath);
    $type = pathinfo($filepath)['extension'];
    $items = $parsers[$type]($content);
    $list = array_map(fn ($item) => "<li>{$item}</li>", $items);
    return "<ul>\n" . implode("\n", $list) . "\n</ul>";
}
