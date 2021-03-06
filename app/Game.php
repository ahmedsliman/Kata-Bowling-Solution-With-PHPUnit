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
        $thisBall = 0;
        for ($i = 0; $i < 20; $i += 2) {
            if ($this->isStrike($thisBall)) { // Strike
                $score += 10 + $this->rolled[$thisBall + 1] + $this->rolled[$thisBall + 2];
                $thisBall += 1;
            } else if ($this->isSpare($thisBall)) { // Spare
                $score += 10 + $this->rolled[$thisBall + 2];
                $thisBall += 2;
            } else {
                $score += $this->rolled[$thisBall] + $this->rolled[$thisBall + 1];
                $thisBall += 2;
            }
        }
        return $score;
    }

    /**
     * @param $thisBall
     * @return bool
     */
    public function isStrike($thisBall)
    {
        return $this->rolled[$thisBall] == 10;
    }

    /**
     * @param $thisBall
     * @return bool
     */
    public function isSpare($thisBall)
    {
        return $this->rolled[$thisBall] + $this->rolled[$thisBall + 1] == 10;
    }
}