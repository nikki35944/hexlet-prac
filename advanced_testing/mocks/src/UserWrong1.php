<?php

namespace Web\Testing\Mocks\Src;

use Web\Testing\Mocks\Src\ActiveRecord;
use Web\Testing\Mocks\Src\DbInterface;

class UserWrong1 implements ActiveRecord
{
    private $connection;
    private $firstName;
    private $lastName;

    public function __construct(DbInterface $dbconnection)
    {
        $this->connection = $dbconnection;
    }

    public function setFirstName($first)
    {
        $this->firstName = $first;
    }

    public function setLastName($last)
    {
        $this->lastName = $last;
    }

    public function save()
    {
        $sql = "insert into users ('{$this->firstName}', '{$this->lastName}')";
        $this->connection->query($sql);
    }
}

