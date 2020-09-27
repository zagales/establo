<?php

declare(strict_types=1);

namespace RacingCar\TirePressureMonitoring;

class Alarm
{
    private const LOW_PRESSURE_THRESHOLD = 17;

    private const HIGH_PRESSURE_THRESHOLD = 21;

    private $isAlarmOn = false;

    private $sensor;

    public function __construct(Sensor $sensor = null)
    {
        if ($sensor === null) {
            $this->sensor = new Sensor();
        } else {
            $this->sensor = $sensor;
        }
    }

    public function check(): void
    {
        $psiPressureValue = $this->sensor->popNextPressurePsiValue();
        if ($psiPressureValue < self::LOW_PRESSURE_THRESHOLD || $psiPressureValue > self::HIGH_PRESSURE_THRESHOLD) {
            $this->isAlarmOn = true;
        }
    }

    public function isAlarmOn(): bool
    {
        //Todo Should we call check before returning isAlarmOn?
        return $this->isAlarmOn;
    }
}
