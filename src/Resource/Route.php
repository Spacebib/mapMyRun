<?php

namespace Spacebib\MapMyRun\Resource;

class Route extends AbstractResource
{
    public function collection(array $params)
    {
        $path = 'route';

        $parameters['query'] = $params;

        return $this->rest->getResponse('GET', $path, $parameters);
    }

    public function get($pk)
    {
        $path = "route/{$pk}/";

        return $this->rest->getResponse('GET', $path);
    }
}
