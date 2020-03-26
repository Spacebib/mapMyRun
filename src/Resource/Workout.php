<?php

namespace Spacebib\MapMyRun\Resource;

use Spacebib\MapMyRun\Resource\Exception\InvalidQueryParams;
use Spacebib\MapMyRun\REST;

class Workout
{
    /**
     * @var REST
     */
    private $rest;

    /**
     * Activity constructor.
     * @param REST $rest
     */
    public function __construct(REST $rest)
    {
        $this->rest = $rest;
    }

    public function collection($queryParams)
    {
        $path = 'workout';
        if(!array_key_exists('user', $queryParams)) {
            throw new InvalidQueryParams('[user] is required for getting workouts of the specified User');
        }
        $parameters['query'] = $queryParams;

        return $this->rest->getResponse('GET', $path, $parameters);
    }

    public function get($pk)
    {
        $path = "workout/{$pk}";

        return $this->rest->getResponse('GET', $path);
    }
}