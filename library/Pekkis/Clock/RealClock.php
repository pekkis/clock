<?php

namespace Pekkis\Clock;

use DateTime;
use DateTimeZone;

/**
 * A clock for REAL men
 */
class RealClock implements Clock
{
    /**
     * @var DateTimeZone
     */
    private $timezone;

    public function __construct()
    {
        $this->timezone = new DateTimeZone('Europe/Helsinki');
    }

    /**
     * @return int
     */
    public function getTime()
    {
        return \time();
    }

    /**
     * @return DateTime
     */
    public function getDateTime()
    {
        $now = DateTime::createFromFormat('U', $this->getTime());
        $now->setTimezone($this->timezone);
        return $now;
    }
}
