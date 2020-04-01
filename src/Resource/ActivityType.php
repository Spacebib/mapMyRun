<?php

namespace Spacebib\MapMyRun\Resource;

class ActivityType extends AbstractResource
{
    public function collection(array $params)
    {
        $path = 'activity_type';

        $parameters['query'] = $params;

        return $this->rest->getResponse('GET', $path, $parameters);
    }

    public function get($pk)
    {
        $path = "activity_type/{$pk}/";

        return $this->rest->getResponse('GET', $path);
    }
}