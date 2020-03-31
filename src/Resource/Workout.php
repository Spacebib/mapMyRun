<?php

namespace Spacebib\MapMyRun\Resource;

use Spacebib\MapMyRun\Resource\Exception\InvalidQueryParams;

class Workout extends AbstractResource
{
    public function collection(array $params)
    {
        $path = 'workout';
        if (!array_key_exists('user', $params)) {
            throw new InvalidQueryParams('[user] is required for getting workouts of the specified User');
        }
        $parameters['query'] = $params;

        return $this->rest->getResponse('GET', $path, $parameters);
    }

    public function get($pk)
    {
        $path = "workout/{$pk}";

        return $this->rest->getResponse('GET', $path);
    }
}
