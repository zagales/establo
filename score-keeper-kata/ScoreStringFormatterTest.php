<?php declare(strict_types=1);

namespace Kata;

use PHPUnit\Framework\TestCase;

class ScoreStringFormatterTest extends TestCase
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

    /**
     * @dataProvider validScores
     */
    public function test_the_two_scores_are_separated($scoreA, $scoreB)
    {
        //Arrange        
        $formattedScore = $this->scoreFormatter->format($scoreA, $scoreB);
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

    /**
     * @dataProvider validScores
     */
    public function test_valid_scores($scoreA, $scoreB, $expectedFormatedScore)
    {     
        //Arrange
        $expectedLength = 7;
        
        //Act
        $formattedScore = $this->scoreFormatter->format($scoreA, $scoreB);
        $scoreLength = strlen($formattedScore);

        //Assert
        $this->assertEquals($expectedLength, $scoreLength);
        $this->assertEquals($expectedFormatedScore, $formattedScore);
    }

    public function validScores()
    {
        return [
            'one one digit scores' => [1, 1, "001:001"],
            'one two digit scores' => [5, 18, "005:018"],
            'one three digit scores' => [9, 130, "009:130"],
            'two one digit scores' => [20, 3, "020:003"],
            'two two digit scores' => [20, 30, "020:030"],
            'two three digit scores' => [20, 130, "020:130"],
            'three one digit scores' => [101, 9, "101:009"],
            'three two digit scores' => [101, 30, "101:030"],
            'three three digit scores' => [101, 130, "101:130"]
        ];
    }
}