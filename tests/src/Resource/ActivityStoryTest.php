<?php

namespace Spacebib\MapMyRun\Tests\Resource;

use Spacebib\MapMyRun\Resource\ActivityStory;
use Spacebib\MapMyRun\REST;
use PHPUnit_Framework_TestCase;

class ActivityStoryTest extends PHPUnit_Framework_TestCase
{
    private function getRestMock()
    {
        return $this->getMockBuilder(REST::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testGetUserActivities()
    {
        $restMock = $this->getRestMock();
        $restMock
            ->expects($this->once())
            ->method('getResponse')
            ->will($this->returnValue(['response' => 1]));

        $activity = new ActivityStory($restMock);
        $output = $activity->collection(['feed_type' => 'public',]);
        $this->assertArrayHasKey('response', $output);
    }
}