<!-- resources/views/inventory/create.blade.php -->

@extends('layouts.lay')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Create New Inventory Entry</h1>

        <!-- Display validation errors if any -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Add a form for creating a new inventory entry -->
        <form method="post" action="{{ route('inventory.store') }}" class="max-w-md mx-auto">
            @csrf

            <div class="mb-4">
                <label for="product_name" class="block text-sm font-semibold text-gray-600">Product Name:</label>
                <input type="text" name="product_name" id="product_name" placeholder="Enter product name" class="form-input mt-1 py-3 px-1 outline-none ring-1 ring-gray-400 block w-full" value="{{ old('product_name') }}" required>
            </div>

            <div class="mb-4">
                <label for="units" class="block text-sm font-semibold text-gray-600">Units:</label>
                <input type="number" name="units" id="units" placeholder="Enter units" class="form-input mt-1 py-3 px-1 outline-none ring-1 ring-gray-400 block w-full" value="{{ old('units') }}" required>
            </div>

            <div class="mb-4">
                <label for="notes" class="block text-sm font-semibold text-gray-600">Notes:</label>
                <textarea name="notes" id="notes" placeholder="Enter notes" class="form-input mt-1 py-3 px-1 outline-none ring-1 ring-gray-400 block w-full">{{ old('notes') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="stock_in" class="block text-sm font-semibold text-gray-600">Stock In:</label>
                <input type="number" name="stock_in" id="stock_in" placeholder="Enter stock in" class="form-input mt-1 py-3 px-1 outline-none ring-1 ring-gray-400 block w-full" value="{{ old('stock_in') }}" required>
            </div>

            <div class="mb-4">
                <label for="stock_out" class="block text-sm font-semibold text-gray-600">Stock Out:</label>
                <input type="number" name="stock_out" id="stock_out" placeholder="Enter stock out" class="form-input mt-1 py-3 px-1 outline-none ring-1 ring-gray-400 block w-full" value="{{ old('stock_out') }}" required>
            </div>

            <div class="mb-4">
                <label for="consumed" class="block text-sm font-semibold text-gray-600">Consumed:</label>
                <input type="number" name="consumed" id="consumed" placeholder="Enter consumed" class="form-input mt-1 py-3 px-1 outline-none ring-1 ring-gray-400 block w-full" value="{{ old('consumed') }}" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Create Entry</button>
        </form>
    </div>
@endsection
