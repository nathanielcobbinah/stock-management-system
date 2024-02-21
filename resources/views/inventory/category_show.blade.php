<!-- resources/views/inventory/category_show.blade.php -->

@extends('layouts.lay')

@section('content')
    <div class="max-w-2xl mx-auto p-5">
        <h1 class="text-2xl font-bold mb-4 text-center">Inventory Category Details</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <strong class="text-gray-700">Category ID:</strong>
                <span class="ml-2">{{ $category->id }}</span>
            </div>

            <div class="mb-4">
                <strong class="text-gray-700">Category Name:</strong>
                <span class="ml-2">{{ $category->category_name }}</span>
            </div>

            <!-- Add any other details you want to display -->

            <div class="flex justify-between mt-6">
                <a href="{{ route('inventory.category.edit', $category->id) }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Edit Category</a>

                <form action="{{ route('inventory.categories.destroy', ['category' => $category->id]) }}" method="post" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700">Delete Category</button>
                </form>
            </div>

            <a href="{{ route('inventory.categories') }}" class="mt-4 inline-block bg-gray-400 text-white py-2 px-4 rounded hover:bg-gray-500">Back to Category List</a>
        </div>
    </div>
@endsection
