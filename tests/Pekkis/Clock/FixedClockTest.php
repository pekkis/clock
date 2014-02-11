<?php

namespace Pekkis\Clock\Tests;

use Pekkis\Clock\FixedClock;
use DateTime;
use DateTimeZone;

class FixedClockTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function instantiatesWithTimestamp()
    {
        $now = time();
        $clock = new FixedClock($now);
        $this->assertEquals($now, $clock->getTime());
    }

    /**
     * @test
     */
    public function instantiatesWithDateTime()
    {
        $now = new DateTime('1978-03-21', new DateTimeZone('Australia/Sydney'));
        $clock = new FixedClock($now);
        $this->assertEquals($now->format('U'), $clock->getTime());
    }

    /**
     * @xtest
     */
    public function getTimeReturnsTimestamp()
    {
        $clock = new FixedClock(999999);
        $this->assertInternalType('numeric', $clock->getTime());
    }

    /**
     * @test
     */
    public function getDateTimeReturnsDateTime()
    {
        $clock = new FixedClock(1000000);
        $now = $clock->getDateTime();
        $this->assertInstanceof('DateTime', $now);
        $this->assertEquals($now->getTimezone()->getName(), date_default_timezone_get());
    }

    /**
     * @test
     */
    public function respectsTimeZone()
    {
        $clock = new FixedClock(new DateTime('1978-03-21'));

        $now = $clock->getDateTime();

        $this->assertEquals('1978-03-21', $now->format('Y-m-d'));
    }

}
