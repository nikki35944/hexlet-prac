<?php

namespace App;

// BEGIN (write your solution here)
class User
{
    private $name;
    private $addresses;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addAddress(User\Address $address)
    {
        $this->addresses[] = $address;
    }

    public function getAddresses()
    {
        return $this->addresses;
    }
    public function getName()
    {
        return $this->name;
    }
}
// END
