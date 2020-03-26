<?php

namespace Spacebib\MapMyRun\Tests;

use Spacebib\MapMyRun\Resource\Activity;
use Spacebib\MapMyRun\REST;
use PHPUnit_Framework_TestCase;

class RESTTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var REST
     */
    private $rest;

    public function setUp()
    {
        $adapter = $this->getMockBuilder('\GuzzleHttp\Client')
            ->disableOriginalConstructor()
            ->getMock();

        $this->rest = new REST('token', 'api_key', $adapter);
    }

    public function tearDown()
    {
        unset($this->rest);
    }

    public function testGetResponseWillReturnBodyWhenSuccess()
    {
        $responseMock = $this->getMockBuilder('\GuzzleHttp\Psr7\Response')
            ->disableOriginalConstructor()
            ->getMock();

        $responseMock
            ->method('getBody')
            ->will($this->returnValue(json_encode([])));
        $responseMock->method('getStatusCode')
            ->willReturn(200);
        $adapter = $this->getMockBuilder('\GuzzleHttp\Client')
            ->disableOriginalConstructor()
            ->getMock();
        $adapter->method('request')
            ->willReturn($responseMock);
        $this->snoop('adapter', $adapter, $this->rest);

        $this->assertEquals([], $this->rest->getResponse('GET', 'path', []));
    }

    public function testGetResponseWillReturnErrorArray()
    {
        $responseMock = $this->getMockBuilder('\GuzzleHttp\Psr7\Response')
            ->disableOriginalConstructor()
            ->getMock();

        $responseMock
            ->method('getBody')
            ->will($this->returnValue(json_encode([])));
        $responseMock->method('getStatusCode')
            ->willReturn(400);
        $adapter = $this->getMockBuilder('\GuzzleHttp\Client')
            ->disableOriginalConstructor()
            ->getMock();
        $adapter->method('request')
            ->willReturn($responseMock);
        $this->snoop('adapter', $adapter, $this->rest);

        $this->assertEquals([400 => null], $this->rest->getResponse('GET', 'path', []));
    }

    public function testGetToken()
    {
        $this->assertEquals('token', $this->rest->getToken());
    }

    public function testActivity()
    {
        $this->assertInstanceOf(Activity::class, $this->rest->activity());
    }

    function snoop($variableName, $mock, $targetObject)
    {
        $snooper = function () use ($mock, $variableName) {
            $this->{$variableName} = $mock;
        };

        $latestSnoop = $snooper->bindTo($targetObject, get_class($targetObject));

        $latestSnoop();
    }
}