<!-- resources/views/inventory/category.blade.php -->

@extends('layouts.lay')

@section('content')
    <div class="max-w-4xl mx-auto p-5 sm:p-10">
        <h1 class="text-2xl font-bold mb-4 text-center">Inventory Categories</h1>

        <!-- Display category data in a table -->
        <div class="overflow-x-auto">
            <table class="min-w-full border border-collapse border-gray-200">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 border">ID</th>
                        <th class="py-2 px-4 border">Category Name</th>
                        <th class="py-2 px-4 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="py-2 px-4 border">{{ $category->id }}</td>
                            <td class="py-2 px-4 border">{{ $category->category_name }}</td>
                            <td class="py-2 px-4 border space-x-2">
                                <!-- Add actions as needed -->
                                <a href="{{ route('inventory.category.show', ['id' => $category->id]) }}" class="text-blue-500 hover:underline">View</a>
                                <a href="{{ route('inventory.category.edit', ['id' => $category->id]) }}" class="text-green-500 hover:underline">Edit</a>
                                <form action="{{ route('inventory.categories.destroy', ['category' => $category->id]) }}" method="post" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <a href="{{ route('inventory.categories.create') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Create New Category</a>
        </div>
    </div>
@endsection
