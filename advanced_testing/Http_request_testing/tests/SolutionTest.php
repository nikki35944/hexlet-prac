<?php

namespace Web\Testing\HttpRequests\Tests;

use Web\Testing\HttpRequests\Src\RepositoryClient;
use PHPUnit\Framework\TestCase;

use function Web\Testing\HttpRequests\getUserMainLanguageWrong as getUserMainLanguage;

class SolutionTest extends TestCase
{
    // BEGIN (write your solution here)
    public function testGetUserMainLanguage()
    {
        $languageArray = [
            ['language' => 'php'],
            ['language' => 'javascript'],
            ['language' => 'php'],
            ['language' => 'python']
        ];
        $client = $this->createMock(RepositoryClient::class);
        $client->method('repos')
            ->willReturn($languageArray);
        $actual = getUserMainLanguage('', $client);
        $expected = 'php';
        $this->assertEquals($expected, $actual);
    }

    // END
}

