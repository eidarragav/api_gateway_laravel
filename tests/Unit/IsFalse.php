<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class IsFalse extends TestCase
{

    /** @test */
    public function is_false() {
        $result = false;

        $this->assertTrue($result);
    }
}
