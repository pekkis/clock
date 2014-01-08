<?php

namespace Pekkis\Clock;

use DateTime;

interface Clock
{
    /**
     * @return int
     */
    public function getTime();

    /**
     * @return DateTime
     */
    public function getDateTime();
}
