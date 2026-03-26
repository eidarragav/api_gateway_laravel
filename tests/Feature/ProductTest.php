<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_product_create()
    {
        $response = $this->post("/api/products", [
            "name" => "papa",
            "price" => 3,
            "stock" => 2
        ]);

        
        $response->assertStatus(201);
        #$this->assertAuthenticated();
        $this->assertDatabaseHas('products', ['name' => 'papa']);
    }
}
