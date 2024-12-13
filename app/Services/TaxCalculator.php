<?php

namespace App\Services;

use App\Models\TaxRate;

class TaxCalculator
{
    public static function calculate(string $taxNumber, float $productPrice): float
    {
        $countryCode = substr($taxNumber, 0, 2);
        $taxRate = TaxRate::where('country_code', $countryCode)->first();

        if (!$taxRate) {
            throw new \Exception("Invalid tax number or unsupported country.");
        }

        return round($productPrice * (1 + $taxRate->rate), 2);
    }
}