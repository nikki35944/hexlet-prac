<?php

namespace Web\Testing\Files\Implementations;

function mkdirsWrong($path)
{
    return mkdir(explode("/", $path)[0], 0700);
}

