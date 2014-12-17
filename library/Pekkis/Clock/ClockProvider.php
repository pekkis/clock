<?php

namespace Pekkis\Clock;

use DateTimeZone;

/**
 * Provides a clock implementation
 */
class ClockProvider
{
    /**
     * @var Clock
     */
    private static $clock;

    /**
     * @var DateTimeZone
     */
    private static $timezone;

    /**
     * @param Clock $clock
     */
    public static function setClock(Clock $clock)
    {
        self::$clock = $clock;
    }

    /**
     * @param DateTimeZone $timezone
     */
    public static function setTimezone($timezone)
    {
        self::$timezone = new DateTimeZone($timezone);
    }

    /**
     * @return DateTimeZone
     */
    public static function getTimezone()
    {
        return self::$timezone ?: new DateTimeZone(date_default_timezone_get());
    }

    /**
     * @return Clock
     */
    public static function getClock()
    {
        if (!self::$clock) {
            self::$clock = new RealClock();
        }
        return self::$clock;
    }
}
