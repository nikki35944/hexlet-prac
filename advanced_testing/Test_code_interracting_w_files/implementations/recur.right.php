<?php

namespace Web\Testing\Files\Implementations;

function mkdirs($path)
{
    return mkdir($path, 0700, true);
}
