<?php

namespace Kata;

use PHPUnit\Framework\TestCase;

class ScoreKeeperTest extends TestCase
{
    private $scoreKeeper;
    private $teamA;
    private $teamB;

    public function setUp(): void
    {
        $this->teamA = new Team();
        $this->teamB = new Team();
        $this->scoreKeeper = new ScoreKeeper($this->teamA, $this->teamB);
    }

    public function test_class_can_be_instanciated()
    {
        //Arrange
        $expectedClassName = ScoreKeeper::class;

        //Act
        $teamA = new Team();
        $teamB = new Team();
        $object = new ScoreKeeper($teamA, $teamB);
        
        //Assert
        $this->assertInstanceOf($expectedClassName, $object);
    }

    public function test_score_team_a_increments_one_point()
    {
        //Arrange
        $expectedScore = 1;

        //Act
        $this->scoreKeeper->scoreTeamA1();

        //Assert
        $this->assertEquals($expectedScore, $this->teamA->score());
    }

    public function test_score_team_a_increments_two_points()
    {
        //Arrange
        $expectedScore = 2;

        //Act
        $this->scoreKeeper->scoreTeamA2();

        //Assert
        $this->assertEquals($expectedScore, $this->teamA->score());
    }

    public function test_score_team_a_increments_three_points()
    {
        //Arrange
        $expectedScore = 3;

        //Act
        $this->scoreKeeper->scoreTeamA3();

        //Assert
        $this->assertEquals($expectedScore, $this->teamA->score());    
    }

    public function test_score_team_b_increments_one_point()
    {
        //Arrange
        $expectedScore = 1;

        //Act
        $this->scoreKeeper->scoreTeamB1();

        //Assert
        $this->assertEquals($expectedScore, $this->teamB->score());
    }

    public function test_score_team_b_increments_two_points()
    {
        //Arrange
        $expectedScore = 2;

        //Act
        $this->scoreKeeper->scoreTeamB2();

        //Assert
        $this->assertEquals($expectedScore, $this->teamB->score());
    }

    public function test_score_team_b_increments_three_points()
    {
        //Arrange
        $expectedScore = 3;

        //Act
        $this->scoreKeeper->scoreTeamB3();

        //Assert
        $this->assertEquals($expectedScore, $this->teamB->score());    
    }

    public function test_both_teams_score_points_in_a_real_match()
    {
        //Arrange
        $expectedScore = '105:009';

        //Act
        for ($i=0; $i<100; $i++) {
            $this->scoreKeeper->scoreTeamA1();
        }
        
        $this->scoreKeeper->scoreTeamA2();
        $this->scoreKeeper->scoreTeamA3();
        
        $this->scoreKeeper->scoreTeamB1();
        $this->scoreKeeper->scoreTeamB2();
        $this->scoreKeeper->scoreTeamB3();
        $this->scoreKeeper->scoreTeamB3();

        //Assert
        $this->assertEquals($expectedScore, $this->scoreKeeper->getScore());
    }
}