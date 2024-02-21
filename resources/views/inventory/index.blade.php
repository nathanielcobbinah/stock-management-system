<!-- resources/views/inventory/index.blade.php -->

@extends('layouts.lay')

@section('content')
    <div class="max-w-4xl mx-auto overflow-x-auto p-5">
        <h1 class="text-2xl font-bold mb-4 text-center">Inventory List</h1>

        <!-- Filter by Category Dropdown -->
        <div class="mb-4">
            <label for="category_filter" class="block text-sm font-semibold text-gray-600">Filter by Category:</label>
            <select id="category_filter" class="form-select mt-1 py-1 px-2 border focus:ring-1 focus:ring-blue-400 outline-none block w-1/3" onchange="filterByCategory(this.value)">
                <option value="" selected>All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Display inventory data in a table -->
        <table class="w-full border border-collapse border-gray-200">
            <!-- Table Header -->
            <thead>
                <tr>
                    <th class="py-2 px-4 border">Category</th>
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
                    <tr class="inventory-row">
                        <td class="py-2 px-4 border category-cell" data-category-id="{{ $inventory->category->id }}">{{ $inventory->category->category_name }}</td>
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

        <!-- JavaScript for category filtering -->
        <script>
            function filterByCategory(categoryId) {
                var inventoryRows = document.querySelectorAll('.inventory-row');

                if (categoryId === '') {
                    inventoryRows.forEach(function(row) {
                        row.style.display = 'table-row';
                    });
                } else {
                    inventoryRows.forEach(function(row) {
                        var categoryCell = row.querySelector('.category-cell');
                        var rowCategoryId = categoryCell.getAttribute('data-category-id');

                        if (rowCategoryId === categoryId) {
                            row.style.display = 'table-row';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                }
            }
        </script>
    </div>
@endsection
