<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Implementations\gt;

class TestSolution extends TestCase
{
    public function testGt()
    {
        // BEGIN (write your solution here)
        $this->assertTrue(gt(3, 1));
        $this->assertFalse(gt(3, 3));
        $this->assertFalse(gt(1, 3));
        // END
    }
}