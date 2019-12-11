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

    public function test_a_ten_in_two_frames_is_not_a_spare()
    {
        $this->game->roll(3);
        $this->game->roll(6);
        $this->game->roll(4);
        $this->game->roll(2);
        $this->assertEquals(15, $this->game->score());
    }

    public function test_a_strike_adds_next_two_balls()
    {
        $this->game->roll(10);
        $this->game->roll(3);
        $this->game->roll(2);
        $this->assertEquals(20, $this->game->score());
    }

    public function test_perfect_game_score_is_300()
    {
        for ($i = 0; $i < 12; $i++) {
            $this->game->roll(10);
        }
        $this->assertEquals(300, $this->game->score());
    }
}