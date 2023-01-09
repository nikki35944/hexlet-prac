<?php

namespace Web\Testing\DependencyInjection\Tests;

use PHPUnit\Framework\TestCase;

use function Web\Testing\DependencyInjection\Implementations\getFilesCount;

class SolutionTest extends TestCase
{
    public function testGetFilesCount(): void
    {
        $path = realpath(__DIR__ . '/../fixtures/nested');
        //BEGIN (write your solution here)
        $actual = getFilesCount($path, function () {
            print_r('logging something');
        });
        $expected = 3;
        $this->assertEquals($expected, $actual);
        //END
    }
}
