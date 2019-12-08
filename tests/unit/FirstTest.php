<?php

use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{
    public function test_multiplication_of_two_numbers()
    {
        // $this->assertTrue(true);
        $a = 5;
        $b = 4;
        $c = $a * $b;
        $this->assertEquals($c, 20);
    }
}
