<?php

namespace Web\Testing\Mocks\Src;

class Db implements DbInterface
{
    public function query($sql)
    {
        return true;
    }
}

