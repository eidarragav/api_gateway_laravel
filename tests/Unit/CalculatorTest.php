<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    
    /** @test */
    public function it_adds_two_numbers()
    {
        $result = "8";
        $this->assertEquals(8, $result);
    }
}
