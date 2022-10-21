<?php

function downcaseFileNames($node)
{
    $name = getName($node);
    $meta = getMeta($node);

    if (isFile($node)) {
        $newName = strtolower($name);
        return mkfile($newName, $meta);
    }

    $updatedChildren = array_map(fn($child) => downcaseFileNames($child), getChildren($node));

    return mkdir($name, $updatedChildren, $meta);
}