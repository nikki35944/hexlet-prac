<?php

function normalize($raw)
{
    return collect($raw)
        ->map(fn($value) =>
        array_map(fn($item) =>
        mb_strtolower($item), $value))
        ->map(fn($value) =>
        array_map(fn($item) =>
        trim($item), $value))
        ->mapToGroups(fn($item) =>
        [$item['country'] => $item['name']])
        ->map(fn($cities) =>
        $cities->unique()->sort()->values())
        ->sortKeys()
        ->toArray();
}