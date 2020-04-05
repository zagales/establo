<?php declare(strict_types=1);

namespace Kata;

use PHPUnit\Framework\TestCase;

class ScoreFormatterTest extends TestCase
{
    private $scoreFormatter;

    public function setUp(): void
    {
        $this->scoreFormatter = new ScoreFormatter();        
    }

    public function test_score_is_represented_by_string()
    {
        //Arrange
        $scoreOneDigit = 5;
        
        //Act
        $formattedScore = $this->scoreFormatter->format($scoreOneDigit, $scoreOneDigit);
        
        //Assert
        $this->assertIsString($formattedScore);
    }

    public function test_scores_under_ten_is_represented_by_seven_characters_string()
    {
        //Arrange
        $scoreOneDigit = 5;
        $formattedScore = $this->scoreFormatter->format($scoreOneDigit, $scoreOneDigit);
        $expectedLength = 7;
        
        //Act
        $scoreLength = strlen($formattedScore);

        //Assert
        $this->assertEquals($expectedLength, $scoreLength);
    }

    public function test_scores_under_one_hundred_is_represented_by_seven_characters_string()
    {
        //Arrange
        $scoreTwoDigits = 42;
        $formattedScore = $this->scoreFormatter->format($scoreTwoDigits, $scoreTwoDigits);
        $expectedLength = 7;
        
        //Act
        $scoreLength = strlen($formattedScore);

        //Assert
        $this->assertEquals($expectedLength, $scoreLength);
    } 

    public function test_scores_under_one_thousand_is_represented_by_seven_characters_string()
    {
        //Arrange
        $scoreThreeDigits = 632;
        $formattedScore = $this->scoreFormatter->format($scoreThreeDigits, $scoreThreeDigits);
        $expectedLength = 7;
        
        //Act
        $scoreLength = strlen($formattedScore);

        //Assert
        $this->assertEquals($expectedLength, $scoreLength);
    }

    public function test_the_two_scores_are_separated()
    {
        //Arrange
        $score = 42;
        $formattedScore = $this->scoreFormatter->format($score, $score);
        $expectedSeparatorElement = ':';
        $expectedSeparatorElementPosition = 3;

        //Act
        $separatorElement = substr(
            $formattedScore,
            $expectedSeparatorElementPosition,
            strlen($expectedSeparatorElement)
        );

        //Assert
        $this->assertEquals($expectedSeparatorElement, $separatorElement);
    }         

    public function test_the_two_scores_are_numbers()
    {
        //Arrange
        $score = 42;
        $formattedScore = $this->scoreFormatter->format($score, $score);

        $expectedScoreLength = 3;
        $expectedSeparatorLength = 1;
        $expectedScoreOneStartPosition = 0;
        $expectedScoreTwoStartPosition = $expectedSeparatorLength + $expectedScoreLength;

        //Act
        $scoreOne = substr(
            $formattedScore,
            $expectedScoreOneStartPosition,
            $expectedScoreLength
        );
        $scoreTwo = substr(
            $formattedScore,
            $expectedScoreTwoStartPosition,
            $expectedScoreLength
        );

        //Assert
        $this->assertIsNumeric($scoreOne);
        $this->assertIsNumeric($scoreTwo);
    }
}