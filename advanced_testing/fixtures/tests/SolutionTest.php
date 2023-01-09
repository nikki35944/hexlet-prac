<?php

namespace Web\Testing\Fixtures\Test;

use PHPUnit\Framework\TestCase;

use function Web\Testing\Fixtures\Implementations\toHtmlList;

class SolutionTest extends TestCase
{
    //BEGIN (write your solution here)
    private function getFixtureFullPath(string $fixtureName): string|false
    {
        return realpath(implode('/', [__DIR__, 'fixtures', $fixtureName]));
    }

    public function testJson()
    {
        $html = toHtmlList($this->getFixtureFullPath('list.json'));
        $this->assertStringEqualsFile($this->getFixtureFullPath('result.html'), $html);
    }

    public function testYaml()
    {
        $html = toHtmlList($this->getFixtureFullPath('list.yaml'));
        $this->assertStringEqualsFile($this->getFixtureFullPath('result.html'), $html);
    }

    public function testCsv()
    {
        $html = toHtmlList($this->getFixtureFullPath('list.csv'));
        $this->assertStringEqualsFile($this->getFixtureFullPath('result.html'), $html);
    }
    //END
}
