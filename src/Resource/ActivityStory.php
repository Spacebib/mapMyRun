<?php

namespace Spacebib\MapMyRun\Resource;

class ActivityStory extends AbstractResource
{
    public function collection(array $params)
    {
        $path = 'activity_story';
        $parameters['query'] = $params;

        return $this->rest->getResponse('GET', $path, $parameters);
    }

    public function publicWorkout()
    {
        return $this->collection(['feed_type' => 'public', 'feed_id' => 'workout']);
    }

    public function get($pk)
    {
        $path = "activity_story/{$pk}";

        return $this->rest->getResponse('GET', $path);
    }
}
