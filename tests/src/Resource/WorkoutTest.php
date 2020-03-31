<?php

namespace Spacebib\MapMyRun\Tests\Resource;

use Spacebib\MapMyRun\Resource\Exception\InvalidQueryParams;
use Spacebib\MapMyRun\Resource\Workout;
use Spacebib\MapMyRun\REST;

class WorkoutTest extends \PHPUnit_Framework_TestCase
{
    private function getRestMock()
    {
        return $this->getMockBuilder(REST::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function test_get_user_workouts()
    {
        $restMock = $this->getRestMock();
        $restMock
            ->expects($this->once())
            ->method('getResponse')
            ->will($this->returnValue(['total_count' => 1]));

        $workout = new Workout($restMock);
        $output = $workout->collection(['user' => 1]);
        $this->assertArrayHasKey('total_count', $output);
    }

    public function test_get_workouts_user_is_required()
    {
        $restMock = $this->getRestMock();

        $workout = new Workout($restMock);
        $this->expectException(InvalidQueryParams::class);
        $workout->collection(['limit' => 1]);
    }
}