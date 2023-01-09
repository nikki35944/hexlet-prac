<?php

namespace Web\Testing\Errors\App;

class AclWrong2
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function check($resource, $privilege, $role)
    {
        if (!array_key_exists($resource, $this->data)) {
            throw new Acl\ResourceUndefined();
        }

        if (!array_key_exists($privilege, $this->data[$resource])) {
            return false;
        }

        $roles = $this->data[$resource][$privilege];
        if (!in_array($role, $roles)) {
            throw new Acl\AccessDenied('Access denied');
        }
    }
}
