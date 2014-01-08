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
     * @return int
     */
    public function getTime()
    {
        return \time();
    }

    /**
     * @param string $time
     * @param  DateTimeZone $timezone
     * @return DateTime
     */
    public function getDateTime($time = null, DateTimeZone $timezone = null)
    {
        return new DateTime($time, $timezone);
    }
}
