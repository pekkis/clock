<?php

namespace Pekkis\Clock\Tests;

use Pekkis\Clock\ClockProvider;
use Pekkis\Clock\FixedClock;

class ClockProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function defaultsToRealClock()
    {
        $this->assertInstanceOf('Pekkis\Clock\RealClock', ClockProvider::getClock());
    }

    /**
     * @test
     */
    public function listensToSetter()
    {
        $clock = new FixedClock(time());
        ClockProvider::setClock($clock);
        $this->assertSame($clock, ClockProvider::getClock());
    }

}
