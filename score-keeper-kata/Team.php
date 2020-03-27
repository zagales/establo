<?php

namespace Kata;

class Team
{
    private $score = 0;

    public function increment(): void
    {
        $this->score++;
    }

    public function score(): int
    {
        return $this->score;
    }
}
