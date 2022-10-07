<?php


namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\fill;

// BEGIN (write your solution here)
class SolutionTest extends TestCase
{
    private $coll;

    public function setUp(): void
    {
        $this->coll = [1, 2, 3, 4];
    }

    public function testFill1(): void
    {
        fill($this->coll, '*', 1, 3);
        $this->assertEquals([1, '*', '*', 4], $this->coll);
    }

    public function testFill2(): void
    {
        fill($this->coll, '*');
        $this->assertEquals(['*', '*', '*', '*'], $this->coll);
    }

    public function testFill3(): void
    {
        fill($this->coll, '*', 10, 12);
        $this->assertEquals([1, 2, 3, 4], $this->coll);
    }

    public function testFill4(): void
    {
        fill($this->coll, '*', 2, 2);
        $this->assertEquals([1, 2, 3, 4], $this->coll);
    }

    public function testFill5(): void
    {
        fill($this->coll, '*', 0, 10);
        $this->assertEquals(['*', '*', '*', '*'], $this->coll);
    }
}
// END

function fill($coll, $value, $begin = 0, $end = null)
{
    $length = count($coll);
    $end = $end ?? $length;
    $normalizedBegin = $begin >= $end ? $end : $begin;
    $normalizedEnd = $end >= $length ? $length : $end;
    for ($i = $normalizedBegin; $i < $normalizedEnd; $i++) {
        $coll[$i] = $value;
    }
    // return $coll;


    dump($coll);
}
// END


$arr = [1, 2, 3, 4];
\App\Tests\fill($arr, '*', 1, 3);
fill($arr, '*');
