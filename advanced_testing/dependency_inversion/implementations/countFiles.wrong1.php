<?php

namespace Web\Testing\DependencyInjection\Implementations;

function getFilesCountWrong($path)
{
    $iterator = new \FilesystemIterator($path);
    return iterator_count($iterator) + 1;
}
