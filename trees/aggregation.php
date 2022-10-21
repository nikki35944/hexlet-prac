<?php
function getHiddenFilesCount($node)
{
    $name = getName($node);
    if (isFile($node)) {
        return str_starts_with($name, '.') ? 1 : 0;
    }

    $children = getChildren($node);

    return array_reduce($children, fn($acc, $child) => $acc + getHiddenFilesCount($child));
}