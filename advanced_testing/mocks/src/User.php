<?php

namespace Web\Testing\Mocks\Src;

use Web\Testing\Mocks\Src\ActiveRecord;
use Web\Testing\Mocks\Src\DbInterface;

class User implements ActiveRecord
{
    private $dirty = true;

    private $connection;
    private $firstName;
    private $lastName;

    public function __construct(DbInterface $dbconnection)
    {
        $this->connection = $dbconnection;
    }

    public function setFirstName($first)
    {
        $this->dirty = true;
        $this->firstName = $first;
    }

    public function setLastName($last)
    {
        $this->dirty = true;
        $this->lastName = $last;
    }

    public function save()
    {
        if (!$this->dirty) {
            return false;
        }
        $this->dirty = false;
        $sql = "insert into users ('{$this->firstName}', '{$this->lastName}')";
        $this->connection->query($sql);
    }
}

