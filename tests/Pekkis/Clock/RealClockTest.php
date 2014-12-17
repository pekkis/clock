<?php

namespace Pekkis\Clock\Tests;

use Pekkis\Clock\ClockProvider;
use Pekkis\Clock\RealClock;

class RealClockTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function getTimeReturnsTimestamp()
    {
        $clock = new RealClock();
        $this->assertInternalType('numeric', $clock->getTime());
    }

    /**
     * @test
     */
    public function getDateTimeReturnsDateTime()
    {
        $clock = new RealClock();
        $now = $clock->getDateTime();
        $this->assertInstanceof('DateTime', $now);
        $this->assertEquals($now->getTimezone()->getName(), date_default_timezone_get());
    }

    /**
     * @test
     */
    public function getDateTimeRespectsConfiguredTimezone()
    {
        ClockProvider::setTimezone('UTC');

        $clock = new RealClock();
        $now = $clock->getDateTime();
        $this->assertInstanceof('DateTime', $now);
        $this->assertEquals($now->getTimezone()->getName(), date_default_timezone_get());
    }

}
