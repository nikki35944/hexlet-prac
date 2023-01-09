<?php

namespace Web\Testing\Fixtures\Implementations;

function toHtmlListWrong2($filepath)
{
    $parsers = [
        'json' => fn ($content) => json_decode($content, true),
        'yaml' => fn () => [],
        'csv' => fn ($content) => str_getcsv($content)
    ];

    $content = file_get_contents($filepath);
    $type = pathinfo($filepath)['extension'];
    $items = $parsers[$type]($content);
    $list = array_map(fn ($item) => "<li>{$item}</li>", $items);
    return "<ul>\n" . implode("\n", $list) . "\n</ul>";
}

