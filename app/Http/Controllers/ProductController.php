<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\TaxRate;
use App\Services\TaxCalculator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function calculate(Request $request)
    {
        // Check if first 2 letters like: RU exists in tax_rates.
        Validator::extend('valid_tax_country', function ($attribute, $value, $parameters, $validator) {
            $countryCode = substr($value, 0, 2); // Get the first two letters (country code)
            return TaxRate::where('country_code', $countryCode)->exists();
        });

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'tax_number' => 'required|regex:/^[A-Z]{2}[0-9]{9,11}$/|valid_tax_country',
        ]);

        $product = Product::findOrFail($request->product_id);
        $finalPrice = TaxCalculator::calculate($request->tax_number, $product->price);

        return back()->withInput()->with('price', $finalPrice);
    }
}
