<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TaxRate;
class TaxRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TaxRate::factory()->createMany([
            ['country_code' => 'DE', 'rate' => 0.19],
            ['country_code' => 'IT', 'rate' => 0.22],
            ['country_code' => 'GR', 'rate' => 0.24],
        ]);
    }
}
