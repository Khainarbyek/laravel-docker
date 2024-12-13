<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\TaxRate;
class ProductCalculationTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Product::factory()->create(['name' => 'Headphones', 'price' => 100.00]);
        TaxRate::factory()->create(['country_code' => 'DE', 'rate' => 0.19]);
    }

    public function test_calculate_price_with_valid_data()
    {
        $response = $this->post('/calculate', [
            'product_id' => 1,
            'tax_number' => 'DE123456789',
        ]);

        $response->assertSessionHas('price', 119.00);
    }

    public function test_calculate_price_with_invalid_tax_number()
    {
        $response = $this->post('/calculate', [
            'product_id' => 1,
            'tax_number' => 'RU123',
        ]);

        // The response must return error, because RU is not exists in tax_rates table.
        // Also, 123 is not valid
        $response->assertSessionHasErrors(['tax_number']);
    }
}
