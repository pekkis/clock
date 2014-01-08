<?php

namespace Pekkis\Clock;

use DateTime;
use DateTimeZone;

/**
 * A fixed clock for testing purposes
 */
class FixedClock implements Clock
{
    /**
     * @var int Unix timestamp of current time
     */
    private $time;

    /**
     * @param mixed $time Unix timestamp or DateTime
     */
    public function __construct($time)
    {
        $this->setTime($time);
    }

    /**
     * @param mixed $time Unix timestamp or DateTime object
     */
    public function setTime($time)
    {
        if ($time instanceof DateTime) {
            $time = $time->format('U');
        }
        $this->time = $time;
    }

    /**
     * @return int
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param string $time
     * @param  DateTimeZone $timezone
     * @return DateTime
     */
    public function getDateTime($time = null, DateTimeZone $timezone = null)
    {
        if (!$time) {
            return DateTime::createFromFormat('U', $this->time);
        }
        return new DateTime($time, $timezone);
    }
}
