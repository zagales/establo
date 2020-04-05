<?php

namespace Kata;

use PHPUnit\Framework\TestCase;

class ScoreKeeperTest extends TestCase
{
    private $scoreKeeper;

    public function setUp(): void
    {
        $this->scoreKeeper = new ScoreKeeper();
    }

    public function test_class_can_be_instanciated()
    {
        //Arrange
        $expectedClassName = ScoreKeeper::class;

        //Act
        $object = new ScoreKeeper();
        
        //Assert
        $this->assertInstanceOf($expectedClassName, $object);
    }

    public function test_score_team_a_increments_one_point()
    {
        //Arrange
        $expectedScore = '001:000';

        //Act
        $this->scoreKeeper->scoreTeamA1();

        //Assert
        $this->assertEquals($expectedScore, $this->scoreKeeper->getScore());
    }

    public function test_score_team_a_increments_one_point_twice()
    {
        //Arrange
        $expectedScore = '002:000';

        //Act
        $this->scoreKeeper->scoreTeamA1();
        $this->scoreKeeper->scoreTeamA1();

        //Assert
        $this->assertEquals($expectedScore, $this->scoreKeeper->getScore());
    }

    public function test_score_team_a_increments_two_points()
    {
        //Arrange
        $expectedScore = '002:000';

        //Act
        $this->scoreKeeper->scoreTeamA2();

        //Assert
        $this->assertEquals($expectedScore, $this->scoreKeeper->getScore());
    }

    public function test_score_team_a_increments_three_points()
    {
        //Arrange
        $expectedScore = '003:000';

        //Act
        $this->scoreKeeper->scoreTeamA3();

        //Assert
        $this->assertEquals($expectedScore, $this->scoreKeeper->getScore());
    }

    public function test_score_team_a_increments_ten_points()
    {
        //Arrange
        $expectedScore = '010:000';

        //Act
        $this->scoreKeeper->scoreTeamA3();
        $this->scoreKeeper->scoreTeamA3();
        $this->scoreKeeper->scoreTeamA3();
        $this->scoreKeeper->scoreTeamA1();

        //Assert
        $this->assertEquals($expectedScore, $this->scoreKeeper->getScore());
    }

    public function test_score_team_a_increments_hundred_points()
    {
        //Arrange
        $expectedScore = '100:000';

        //Act
        for ($i = 0; $i<100; $i++) {
            $this->scoreKeeper->scoreTeamA1();
        }

        //Assert
        $this->assertEquals($expectedScore, $this->scoreKeeper->getScore());
    }

    public function test_score_team_b_increments_one_point()
    {
        //Arrange
        $expectedScore = '000:001';

        //Act
        $this->scoreKeeper->scoreTeamB1();

        //Assert
        $this->assertEquals($expectedScore, $this->scoreKeeper->getScore());
    }

    public function test_score_team_b_increments_one_point_twice()
    {
        //Arrange
        $expectedScore = '000:002';

        //Act
        $this->scoreKeeper->scoreTeamB1();
        $this->scoreKeeper->scoreTeamB1();

        //Assert
        $this->assertEquals($expectedScore, $this->scoreKeeper->getScore());
    }

    public function test_both_teams_score_one_point()
    {
        //Arrange
        $expectedScore = '001:001';

        //Act
        $this->scoreKeeper->scoreTeamB1();
        $this->scoreKeeper->scoreTeamA1();

        //Assert
        $this->assertEquals($expectedScore, $this->scoreKeeper->getScore());
    }

    public function test_team_b_scores_five_point()
    {
        //Arrange
        $expectedScore = '000:005';

        //Act
        $this->scoreKeeper->scoreTeamB2();
        $this->scoreKeeper->scoreTeamB3();

        //Assert
        $this->assertEquals($expectedScore, $this->scoreKeeper->getScore());
    }
}