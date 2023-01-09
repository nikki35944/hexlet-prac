<?php

namespace Web\Testing\SideEffects\Test;

use PHPUnit\Framework\TestCase;

use function Web\Testing\SideEffects\Implementations\buildUserWrong3 as buildUser;

class SolutionTest extends TestCase
{
    public function testStructure()
    {
        $keys = [
            'email' => '',
            'firstName' => '',
            'lastName' => '',
        ];
        $user = buildUser();
        $difference = array_merge(array_diff_key($keys, $user), array_diff_key($user, $keys));
        $this->assertEmpty($difference);
    }

    public function testUniqueness()
    {
        $user = buildUser();
        $anotherUser = buildUser();
        $difference = array_merge(array_diff($user, $anotherUser), array_diff($anotherUser, $user));
        $this->assertNotEmpty($difference);
    }

    public function testSetParamValue()
    {
        $values = [
            'email' => 'some@mail.com',
            'firstName' => 'name',
            'lastName' => 'surname'
        ];
        $user = buildUser($values);
        $difference = array_merge(array_diff_assoc($values, $user), array_diff_assoc($user, $values));
        $this->assertEmpty($difference);
    }
}
