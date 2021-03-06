<?php

namespace Spacebib\MapMyRun;

use Spacebib\MapMyRun\Resource\ActivityStory;
use Exception;
use GuzzleHttp\Client;
use Spacebib\MapMyRun\Resource\ActivityType;
use Spacebib\MapMyRun\Resource\Route;
use Spacebib\MapMyRun\Resource\User;
use Spacebib\MapMyRun\Resource\Workout;

class REST
{
    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var Client
     */
    protected $adapter;

    /**
     * REST constructor.
     * @param string $token
     * @param $apiKey
     * @param Client $adapter
     */
    public function __construct($token, $apiKey, Client $adapter)
    {
        $this->token = $token;
        $this->apiKey = $apiKey;
        $this->adapter = $adapter;
    }

    /**
     * Get a request result.
     * Returns an array with a response body or and error code => reason.
     * @param \GuzzleHttp\Psr7\Response $response
     * @return array|mixed
     */
    private function getResult($response)
    {
        $status = $response->getStatusCode();
        if ($status == 200) {
            return json_decode($response->getBody(), JSON_PRETTY_PRINT);
        } else {
            return [$status => $response->getReasonPhrase()];
        }
    }

    /**
     * Get an API request response and handle possible exceptions.
     *
     * @param string $method
     * @param string $path
     * @param array $parameters
     *
     * @return array|mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getResponse($method, $path, $parameters = [])
    {
        $headers = [
            'Api-Key' => $this->apiKey,
            'authorization' => sprintf('Bearer %s', $this->getToken())
        ];

        $options = array_merge($parameters, compact('headers'));

        try {
            $response = $this->adapter->request($method, $path, $options);
            return $this->getResult($response);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function activityStory()
    {
        return (new ActivityStory($this));
    }

    public function workout()
    {
        return (new Workout($this));
    }

    public function user()
    {
        return (new User($this));
    }

    public function route()
    {
        return (new Route($this));
    }

    public function activityType()
    {
        return (new ActivityType($this));
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
}
