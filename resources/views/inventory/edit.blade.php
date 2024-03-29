<!-- resources/views/inventory/edit.blade.php -->

@extends('layouts.lay')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4 text-center p-5">Edit Inventory Entry</h1>

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

        <!-- Add a form for editing an existing inventory entry -->
        <form method="post" action="{{ route('inventory.update', $inventory->id) }}" class="max-w-2xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @csrf
            @method('PUT')

            <div class="mb-4 col-span-1">
                <label for="product_name" class="block text-sm font-semibold text-gray-600">Product Name:</label>
                <input type="text" name="product_name" id="product_name" class="form-input mt-1 py-3 px-1 ring-1 ring-gray-400 outline-none block w-full" value="{{ old('product_name', $inventory->product_name) }}" required>
            </div>

            <div class="mb-4 col-span-1">
                <label for="units" class="block text-sm font-semibold text-gray-600">Units:</label>
                <input type="text" name="units" id="units" class="form-input mt-1 py-3 px-1 ring-1 ring-gray-400 outline-none block w-full" value="{{ old('units', $inventory->units) }}" required>
            </div>

            <div class="mb-4 col-span-2">
                <label for="notes" class="block text-sm font-semibold text-gray-600">Notes:</label>
                <textarea name="notes" id="notes" class="form-input mt-1 py-3 px-1 ring-1 ring-gray-400 outline-none block w-full">{{ old('notes', $inventory->notes) }}</textarea>
            </div>

            <div class="mb-4 col-span-1">
                <label for="stock_in" class="block text-sm font-semibold text-gray-600">Stock In:</label>
                <input type="number" name="stock_in" id="stock_in" class="form-input mt-1 py-3 px-1 ring-1 ring-gray-400 outline-none block w-full" value="{{ old('stock_in', $inventory->stock_in) }}" required>
            </div>

            <div class="mb-4 col-span-1">
                <label for="stock_out" class="block text-sm font-semibold text-gray-600">Stock Out:</label>
                <input type="number" name="stock_out" id="stock_out" class="form-input mt-1 py-3 px-1 ring-1 ring-gray-400 outline-none block w-full" value="{{ old('stock_out', $inventory->stock_out) }}" required>
            </div>

            <div class="mb-4 col-span-1">
                <label for="consumed" class="block text-sm font-semibold text-gray-600">Consumed:</label>
                <input type="number" name="consumed" id="consumed" class="form-input mt-1 py-3 px-1 ring-1 ring-gray-400 outline-none block w-full" value="{{ old('consumed', $inventory->consumed) }}" required>
            </div>

            <div class="mb-4 col-span-1">
                <label for="category_id" class="block text-sm font-semibold text-gray-600">Category:</label>
                <select name="category_id" id="category_id" class="form-select mt-1 py-3 px-1 ring-1 ring-gray-400 outline-none block w-full" required>
                    <option value="" selected disabled>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $inventory->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4 col-span-2">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded w-full hover:bg-blue-700">Update Entry</button>
            </div>
        </form>
    </div>
@endsection
