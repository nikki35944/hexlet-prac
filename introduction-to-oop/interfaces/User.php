<?php
include 'ComparableInterface.php';

class User implements ComparableInterface
{
    private $id;
    private $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function compareTo($user)
    {
        return $this->getId() == $user->getId();
    }
}

$user1 = new User(4, 'tolya');
$user2 = new User(1, 'petya');
$user3 = new User(4, 'petya');

var_dump($user1->compareTo($user3));