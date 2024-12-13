<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Product::factory()->createMany([
            ['name' => 'Headphones', 'price' => 100.00, 'currency' => 'EUR'],
            ['name' => 'Phone Case', 'price' => 20.00, 'currency' => 'EUR'],
        ]);
    }
}
