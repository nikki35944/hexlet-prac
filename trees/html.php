<?php

function changeClass($node, $classNameFrom, $classNameTo) {
    if (array_key_exists('className', $node)) {
        $className = $node['className'];
        $newClassName = $classNameFrom === $className ? $classNameTo : $className;
        $node['className'] = $newClassName;
    }
    if ($node['type'] === 'tag-internal') {
        $newChildren = array_map(fn($item) => changeClass($item, $classNameFrom, $classNameTo), $node['children']);
        $node['children'] = $newChildren;
    }

    return $node;
};