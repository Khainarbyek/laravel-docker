@extends('layouts.app')

@section('web-content')
<div class="max-w-lg mx-auto p-24">
    <form action="/calculate" method="POST">
        @csrf
        <div class="">
            <label for="product_id">Select Product:</label>
            <select name="product_id" id="product_id" class="py-2 w-full border my-2">
                @foreach($products as $product)
                <option value="{{ $product->id }}" {{ old('product_id') === (string) $product->id ? 'selected' : '' }}>{{ $product->name }} ({{ $product->price }} EUR)</option>
                @endforeach
            </select>
            @error('product_id')
            <div class="error text-sm text-red-500 font-semibold my-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="my-8">
            <label for="tax_number">Tax Number:</label>
            <input type="text" name="tax_number" id="tax_number" class="w-full border my-2 py-2 text-center" value="{{ old('tax_number') }}" required>
            @error('tax_number')
            <div class="error text-sm text-red-500 font-semibold my-2">{{ $message }}</div>
            @enderror
        </div>

        @if(session('price'))
        <div class="mt-2 mb-8">Total: {{ session('price') }} EUR</div>
        @endif

        <button type="submit" class="bg-blue-400 hover:bg-blue-600 rounded-md text-white py-2 w-full">Calculate Price</button>
    </form>
</div>
@endsection