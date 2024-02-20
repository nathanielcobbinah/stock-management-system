<!-- resources/views/inventory/index.blade.php -->

@extends('layouts.lay')

@section('content')
    <h1 class="text-2xl font-bold mb-4 text-center p-10">Inventory List</h1>

    <!-- Display inventory data in a table -->
    <table class="min-w-full border border-collapse border-gray-200 mx-5">
        <thead>
            <tr>
                <th class="py-2 px-4 border">ID</th>
                <th class="py-2 px-4 border">Product Name</th>
                <th class="py-2 px-4 border">Units</th>
                <th class="py-2 px-4 border">Notes</th>
                <th class="py-2 px-4 border">Stock In</th>
                <th class="py-2 px-4 border">Stock Out</th>
                <th class="py-2 px-4 border">Consumed</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventories as $inventory)
                <tr>
                    <td class="py-2 px-4 border">{{ $inventory->id }}</td>
                    <td class="py-2 px-4 border">{{ $inventory->product_name }}</td>
                    <td class="py-2 px-4 border">{{ $inventory->units }}</td>
                    <td class="py-2 px-4 border">{{ $inventory->notes }}</td>
                    <td class="py-2 px-4 border">{{ $inventory->stock_in }}</td>
                    <td class="py-2 px-4 border">{{ $inventory->stock_out }}</td>
                    <td class="py-2 px-4 border">{{ $inventory->consumed }}</td>
                    <td class="py-2 px-4 border">
                        <a href="{{ route('inventory.show', ['inventory' => $inventory->id]) }}" class="text-blue-500 hover:underline mr-2">View</a>
                        <a href="{{ route('inventory.edit', ['inventory' => $inventory->id]) }}" class="text-green-500 hover:underline mr-2">Edit</a>
                        <form action="{{ route('inventory.destroy', ['inventory' => $inventory->id]) }}" method="post" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="p-5">
        <a href="{{ route('inventory.create') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Create New Inventory Entry</a>

    
        <a href="" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Export To Excel</a>
    
    </div>
    
    
@endsection
