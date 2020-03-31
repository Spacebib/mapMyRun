<?php

namespace Spacebib\MapMyRun\Resource;

interface ResourceInterface
{
    public function collection(array $params);
    public function get($pk);
}
