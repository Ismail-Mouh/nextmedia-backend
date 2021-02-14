<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    /** @test */
    public function a_product_can_be_added()
    {
        $response = $this->post('/api/products', $this->data());

        $this->assertCount(1, Product::all());
    }

    private function data()
    {
        return [
            'name' => 'Name',
            'description' => 'Description',
            'price' => '100'
        ];
    }
}
