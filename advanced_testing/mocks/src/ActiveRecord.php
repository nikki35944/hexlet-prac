<?php

namespace Web\Testing\Mocks\Src;

interface ActiveRecord
{
    public function __construct(DbInterface $connection);
    public function save();
}

