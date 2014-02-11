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

    private $timezone;

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
            $this->timezone = $time->getTimezone();
            $time = $time->format('U');
        } else {
            $this->timezone = new DateTimeZone(date_default_timezone_get());
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
     * @return DateTime
     */
    public function getDateTime()
    {
        $now = DateTime::createFromFormat('U', $this->time);
        $now->setTimezone($this->timezone);
        return $now;
    }
}
