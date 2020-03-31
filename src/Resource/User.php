<?php

namespace Spacebib\MapMyRun\Resource;


class User extends AbstractResource
{
    public function collection(array $params)
    {
        // TODO: Implement collection() method.
    }

    public function get($pk)
    {
        $path = "user/{$pk}/";

        return $this->getResponse('GET', $path);
    }

    public function self()
    {
        $path = 'user/self/';

        return $this->getResponse('GET', $path);
    }
}
