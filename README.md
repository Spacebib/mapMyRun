# MapMyRun

Integrate with Under Armour's MapMyRun API.

## Installation

`composer require spacebib/map-my-run`

## Usage

```php
use Spacebib\MapMyRun\REST;
/* @var $adapter GuzzleHttp\Client */
$rest = new REST('token', 'api_key', $adapter);

$works = $rest->workout()->collection(['user' => 1]);
```
