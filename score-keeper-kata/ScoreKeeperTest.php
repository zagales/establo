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

    public function test_score_is_represented_by_string()
    {
        //Arrange

        //Act
        $score = $this->scoreKeeper->getScore();
       
        //Assert
        $this->assertIsString($score);
    }

    public function test_score_returns_a_seven_characters_score()
    {
        //Arrange
        $score = $this->scoreKeeper->getScore();
        $expectedLength = 7;

        //Act
        $scoreLength = strlen($score);

        //Assert
        $this->assertEquals($expectedLength, $scoreLength);
    }

    public function test_the_two_scores_are_separated()
    {
        //Arrange
        $score = $this->scoreKeeper->getScore();
        $expectedSeparatorElement = ':';
        $expectedSeparatorElementPosition = 3;

        //Act
        $separatorElement = substr(
            $score,
            $expectedSeparatorElementPosition,
            strlen($expectedSeparatorElement)
        );

        //Assert
        $this->assertEquals($expectedSeparatorElement, $separatorElement);
    }

    public function test_the_two_scores_are_numbers()
    {
        //Arrange
        $score = $this->scoreKeeper->getScore();
        $expectedScoreLength = 3;
        $expectedSeparatorLength = 1;
        $expectedScoreOneStartPosition = 0;
        $expectedScoreTwoStartPosition = $expectedSeparatorLength + $expectedScoreLength;

        //Act
        $scoreOne = substr(
            $score,
            $expectedScoreOneStartPosition,
            $expectedScoreLength
        );
        $scoreTwo = substr(
            $score,
            $expectedScoreTwoStartPosition,
            $expectedScoreLength
        );

        //Assert
        $this->assertIsNumeric($scoreOne);
        $this->assertIsNumeric($scoreTwo);
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
}