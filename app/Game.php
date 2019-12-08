<?php

namespace App;

class Game
{
    public $rolled = [];
    private $currentBall = 0;

    public function __construct()
    {
        $this->rolled = array_fill(0, 21, 0);
    }

    public function roll($pins)
    {
        $this->rolled[$this->currentBall] = $pins;
        $this->currentBall++;
    }

    public function score()
    {
        $score = 0;
        for ($i = 0; $i < 20; $i++) {
            if ($this->rolled[$i] + $this->rolled[$i + 1] == 10) { // Spare
                $score += $this->rolled[$i + 2];
            }
            $score += $this->rolled[$i];
        }
        return $score;
    }
}