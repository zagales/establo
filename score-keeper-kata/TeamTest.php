<?php declare(strict_types=1);

namespace Kata;

use PHPUnit\Framework\TestCase;

class TeamTest extends TestCase
{
    public function test_increment_score()
    {
        //Arrange
        $team = new Team();
        $initialScore = $team->score();

        //Act
        $team->increment();
        $newScore = $team->score();

        //Assert
        $this->assertEquals(0, $initialScore);
        $this->assertEquals(1, $newScore);
    }
}