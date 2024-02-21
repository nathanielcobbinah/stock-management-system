<!-- resources/views/inventory/show.blade.php -->

@extends('layouts.lay')

@section('content')
    <div class="max-w-4xl mx-auto p-5 sm:p-10">
        <h1 class="text-3xl font-bold mb-6 text-center">View {{ $inventory->product_name }}</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 border">ID</th>
                        <th class="py-2 px-4 border">Product Name</th>
                        <th class="py-2 px-4 border">Units</th>
                        <th class="py-2 px-4 border">Notes</th>
                        <th class="py-2 px-4 border">Stock In</th>
                        <th class="py-2 px-4 border">Stock Out</th>
                        <th class="py-2 px-4 border">Consumed</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border">{{ $inventory->id }}</td>
                        <td class="py-2 px-4 border">{{ $inventory->product_name }}</td>
                        <td class="py-2 px-4 border">{{ $inventory->units }}</td>
                        <td class="py-2 px-4 border">{{ $inventory->notes ?: 'N/A' }}</td>
                        <td class="py-2 px-4 border">{{ $inventory->stock_in }}</td>
                        <td class="py-2 px-4 border">{{ $inventory->stock_out }}</td>
                        <td class="py-2 px-4 border">{{ $inventory->consumed }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-6 space-y-4 sm:space-x-4 sm:flex sm:justify-center">
            <a href="{{ route('inventory.edit', $inventory->id) }}" class="block sm:inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Edit Inventory Entry</a>
            <!-- Add any other details or actions you want to display -->

            <a href="{{ route('inventory.index') }}" class="block sm:inline-block bg-gray-400 text-white py-2 px-4 rounded hover:bg-gray-500">Back to Inventory List</a>
        </div>
    </div>
@endsection
