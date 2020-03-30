<?php

namespace Spacebib\MapMyRun\Resource;

use Spacebib\MapMyRun\REST;

class Activity
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

    public function collection($feedType, $feedId)
    {
        $path = 'activity_story';
        $parameters['query'] = [
            'feed_type' => $feedType,
            'feed_id' => $feedId,
        ];

        return $this->rest->getResponse('GET', $path, $parameters);
    }

    public function publicWorkout()
    {
        return $this->collection('public', 'workout');
    }

    public function get($pk)
    {
        $path = "activity_story/{$pk}";

        return $this->rest->getResponse('GET', $path);
    }
}
