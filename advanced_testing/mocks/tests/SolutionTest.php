<?php

namespace Web\Testing\Mocks\Tests;

use Web\Testing\Mocks\Src\User as User;
use Web\Testing\Mocks\Src\Db;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    private $mock;
    private $user;
    protected function setUp(): void
    {
        $this->mock = $this->createMock(Db::class);
        $this->mock->method('query');
        $this->user = new User($this->mock);
    }


    public function testSave()
    {
        $this->mock->expects($this->once())
            ->method('query');
        $this->user->save();
        $this->user->save();
    }

    public function testChangeName()
    {
        $this->mock->expects($this->exactly(2))
            ->method('query');
        $this->user->save();
        $this->user->setFirstName('first');
        $this->user->save();
    }
    public function testChangeSurname()
    {
        $this->mock->expects($this->exactly(2))
            ->method('query');
        $this->user->save();
        $this->user->setLastName('second');
        $this->user->save();
    }
}
