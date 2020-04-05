<?php declare(strict_types=1);

namespace Kata;

class ScoreFormatter
{
    public function format(int $scoreA, int $scoreB): string
    {
        $scoreA = $this->formattedScore($scoreA);
        $scoreB = $this->formattedScore($scoreB);

        return "{$scoreA}:{$scoreB}";
    }

    private function formattedScore(int $score): string
    {
        return str_pad("{$score}", 3, '0', STR_PAD_LEFT);
    }
}