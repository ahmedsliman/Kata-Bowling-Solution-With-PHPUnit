<?php

use PHPUnit\Framework\TestCase;
use App\Game as Game;

class BlowlingTest extends TestCase
{
    public $game;
    public function setUp(): void
    {
        $this->game = new Game();
    }

    public function test_roll_zero_score_is_zero()
    {
        $this->game->roll(0);
        $this->assertEquals(0, $this->game->score());
    }

    public function test_open_frame_adds_pins()
    {
        $this->game->roll(4);
        $this->game->roll(2);
        $this->assertEquals(6, $this->game->score());
    }

    public function test_spare_adds_next_ball()
    {
        $this->game->roll(4);
        $this->game->roll(6);
        $this->game->roll(3);
        $this->game->roll(0);
        $this->assertEquals(16, $this->game->score());
    }
}