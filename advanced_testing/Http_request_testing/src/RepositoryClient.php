<?php

namespace Web\Testing\HttpRequests\Src;

class RepositoryClient implements RepositoryClientInterface
{
    public function repos($user)
    {
        throw new \Exception('Can not send http request');
    }
}
