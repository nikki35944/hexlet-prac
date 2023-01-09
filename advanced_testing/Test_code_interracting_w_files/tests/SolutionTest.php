<?php

namespace Web\Testing\Files\Tests;

use function Web\Testing\Files\Implementations\mkdirsWrong as mkdirs;

use PHPUnit\Framework\TestCase;


// BEGIN (write your solution here)
use org\bovigo\vfs\{vfsStream, vfsStreamDirectory, visitor\vfsStreamStructureVisitor};

// END

class SolutionTest extends TestCase
{
    // BEGIN (write your solution here)
    private $root;

    public function setUp(): void
    {
        $this->root = vfsStream::setup('test');
    }

    public function testRecursiveMkdir()
    {
        $newPath = 'test/end';
        $directoryPath = vfsStream::url('test');
        mkdirs($directoryPath . "/" . $newPath);
        $actual = vfsStream::inspect(new vfsStreamStructureVisitor(), $this->root)->getStructure();
        $expected = [
            'test' => [
                'test' => [
                    'end' => []
                ]
            ]
        ];
        $this->assertEquals($expected, $actual);
    }
    // END
}
