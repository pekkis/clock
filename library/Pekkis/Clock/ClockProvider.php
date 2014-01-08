<?php

namespace Pekkis\Clock;

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
     * @param Clock $clock
     */
    public static function setClock(Clock $clock)
    {
        self::$clock = $clock;
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
