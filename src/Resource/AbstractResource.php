<?php

namespace Spacebib\MapMyRun\Resource;

use Spacebib\MapMyRun\REST;

class AbstractResource implements ResourceInterface
{
    /**
     * @var REST
     */
    protected $rest;

    /**
     * Activity constructor.
     * @param REST $rest
     */
    public function __construct(REST $rest)
    {
        $this->rest = $rest;
    }

    public function collection(array $params)
    {
        // TODO: Implement collection() method.
    }

    public function get($pk)
    {
        // TODO: Implement get() method.
    }
}