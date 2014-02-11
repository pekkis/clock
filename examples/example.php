<?php

namespace Pekkis\Clock\Example;

require_once __DIR__ . '/../vendor/autoload.php';

use Pekkis\Clock\ClockProvider;
use Pekkis\Clock\FixedClock;
use DateTime;

// Real system clock, returns actual time
$time = ClockProvider::getClock()->getTime();
var_dump($time);

// Fixed clock (for testing for example)
ClockProvider::setClock(new FixedClock(new DateTime('1978-03-21')));
$time = ClockProvider::getClock()->getTime();
var_dump($time);

// Get time as datetime object
$time = ClockProvider::getClock()->getDateTime();
var_dump($time->format('Y-m-d H:i:s'));
