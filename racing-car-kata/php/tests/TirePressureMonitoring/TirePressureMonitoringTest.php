<?php

declare(strict_types=1);

namespace Tests\TirePressureMonitoring;

use PHPUnit\Framework\TestCase;
use RacingCar\TirePressureMonitoring\Alarm;
use RacingCar\TirePressureMonitoring\Sensor;

class TirePressureMonitoringTest extends TestCase
{
    public function testAlarmIsOffByDefault(): void
    {
        $alarm = new Alarm();
        $this->assertFalse($alarm->isAlarmOn());
    }

    public function testAlarmIsOnWhenOutOfThreshold(): void
    {
        $sensor = new class () extends Sensor {
            public function popNextPressurePsiValue()
            {
                return 15;
            }
        };

        $alarm = new Alarm($sensor);
        $alarm->check();
        $this->assertTrue($alarm->isAlarmOn());
    }

    public function testAlarmIsOffWhenInThreshold(): void
    {
        $sensor = $this->createMock(Sensor::class);
        $sensor->method('popNextPressurePsiValue')
            ->willReturn(18);

        $alarm = new Alarm($sensor);
        $alarm->check();
        $this->assertFalse($alarm->isAlarmOn());
    }
}
