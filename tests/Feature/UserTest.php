<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_register()
    {
        $response = $this->post("/api/register", [
            "name" => "Teli",
            "email" => 'e.com',
            "password" => '1234',
            'question' => 'mi',
            'resquestion' => 'teli'
        ]);

        $response->assertStatus(200);
        #$this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['email' => 'e.com']);
    }
}
