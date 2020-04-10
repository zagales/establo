<?php declare(strict_types=1);

namespace Kata;

class ScoreKeeper
{
    private $teamA;

    private $teamB;

    public function __construct(Team $teamA, Team $teamB)
    {
        $this->teamA = $teamA;
        $this->teamB = $teamB;
    }

    public function scoreTeamA1(): void
    {
        $this->incrementScoreTeamA();
    }

    public function scoreTeamA2(): void
    {
        $this->incrementScoreTeamA();
        $this->incrementScoreTeamA();
    }

    public function scoreTeamA3(): void
    {
        $this->incrementScoreTeamA();
        $this->incrementScoreTeamA();
        $this->incrementScoreTeamA();
    }

    private function incrementScoreTeamA(): void
    {
        $this->teamA->increment();
    }

    public function scoreTeamB1(): void
    {
        $this->incrementScoreTeamB();
    }

    public function scoreTeamB2(): void
    {
        $this->incrementScoreTeamB();
        $this->incrementScoreTeamB();
    }

    public function scoreTeamB3(): void
    {
        $this->incrementScoreTeamB();
        $this->incrementScoreTeamB();
        $this->incrementScoreTeamB();
    }

    private function incrementScoreTeamB(): void
    {
        $this->teamB->increment();
    }

    public function getScore(): string
    {
        $scoreFormatter = new ScoreFormatter();

        return $scoreFormatter->format(
            $this->teamA->score(),
            $this->teamB->score()
        );
    }
    
}
