<?php

namespace Spacebib\MapMyRun\Tests\Resource;

use Spacebib\MapMyRun\Resource\Activity;
use Spacebib\MapMyRun\REST;
use PHPUnit_Framework_TestCase;

class ActivityTest extends PHPUnit_Framework_TestCase
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

        $activity = new Activity($restMock);
        $output = $activity->collection('public', null);
        $this->assertArrayHasKey('response', $output);
    }
}