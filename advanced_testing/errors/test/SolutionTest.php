<?php

namespace Web\Testing\Errors\App\Tests;

use PHPUnit\Framework\TestCase;
use Web\Testing\Errors\App\Acl;
use Web\Testing\Errors\App\AclWrong1;
use Web\Testing\Errors\App\AclWrong2;
use Web\Testing\Errors\App\AclWrong3;
use Web\Testing\Errors\App\Acl\{
    AccessDenied,
    ResourceUndefined,
    PrivilegeUndefined
};

// phpcs:disable
require_once __DIR__ . '/../src/App/Acl/AccessDenied.php';
require_once __DIR__ . '/../src/App/Acl/ResourceUndefined.php';
require_once __DIR__ . '/../src/App/Acl/PrivilegeUndefined.php';
// phpcs:enable

class SolutionTest extends TestCase
{
    private static $data = [
        'articles' => [
            'show' => ['editor', 'manager'],
            'edit' => ['editor']
        ],
        'money' => [
            'create' => ['editor'],
            'show' => ['editor', 'manager'],
            'edit' => ['manager'],
            'remove' => ['manager']
        ]
    ];

    public function testAccessDenied()
    {
        $acl = new AclWrong3(static::$data);

        // BEGIN (write your solution here)
        $this->expectException(AccessDenied::class);
        $acl->check('articles', 'edit', 'manager');
        // END
    }

    // BEGIN (write your solution here)
    public function testPrivilegeUndefined()
    {
        $acl = new AclWrong3(static::$data);
        $this->expectException(PrivilegeUndefined::class);
        $acl->check('articles', 'remove', 'manager');
    }

    public function testResourceUndefined()
    {
        $acl = new AclWrong3(static::$data);
        $this->expectException(ResourceUndefined::class);
        $acl->check('undefined', 'anything', 'anyone');
    }
    // END
}
