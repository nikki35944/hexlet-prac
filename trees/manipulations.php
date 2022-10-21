<?php
function compressImages($node)
{
    $children = getChildren($node);
    $newChildren = array_map(function ($child) {
        $name = getName($child);
        if (!isFile($child) || !str_ends_with($name, '.jpg')) {
            return $child;
        }

        $meta = getMeta($child);
        $meta['size'] /= 2;

        return mkfile($name, $meta);
    }, $children);

    return mkdir(getName($node), $newChildren, getMeta($node));
}