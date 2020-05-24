<?php

declare(strict_types=1);

namespace Tests\TirePressureMonitoring;

use PHPUnit\Framework\TestCase;
use RacingCar\TirePressureMonitoring\Alarm;

class TirePressureMonitoringTest extends TestCase
{
    public function testAlarmIsOffByDefault(): void
    {
        $alarm = new Alarm();
        $this->assertFalse($alarm->isAlarmOn());
    }

    public function testAlarmIsOnWhenOutOfThreshold(): void
    {
        $sensor = new class() {
            public function popNextPressurePsiValue()
            {
                return 15;
            }
        };

        $alarm = new Alarm($sensor);
        $alarm->check();
        $this->assertTrue($alarm->isAlarmOn());
    }
}
