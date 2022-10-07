<?php
namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Implementations\set;

class SolutionTest extends TestCase
{
    //BEGIN (write your solution here)
    private $data;
    private $dataCopy;

    public function setUp(): void
    {
        $this->data = [
            'a' => [
                'b' => [
                    'c' => 'd'
                ]
            ]
        ];
        $this->dataCopy = $this-> data;
    }

    public function testSolutionWithPlainSet(): void
    {
        set($this->data, ['a'], 'value');
        $this->dataCopy['a'] = 'value';
        $this->assertEquals($this->dataCopy, $this->data);
    }

    public function testSolutionWithNestedSet(): void
    {
        set($this->data, ['a', 'b', 'c'], 'value');
        $this->dataCopy['a']['b']['c'] = 'value';
        $this->assertEquals($this->dataCopy, $this->data);
    }

    public function testSolutionWithNewProperty(): void
    {
        set($this->data, ['a', 'b', 'd'], 'value');
        $this->dataCopy['a']['b']['d'] = 'value';
        $this->assertEquals($this->dataCopy, $this->data);
    }




    //END
}
