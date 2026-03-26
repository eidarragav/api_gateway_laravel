<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;


class IsTrue extends TestCase
{
    /** @test */
    public function is_true(){
        $result = true;
        $this->assertTrue($result);
    }
}
