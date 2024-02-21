<!-- resources/views/inventory/create.blade.php -->

@extends('layouts.lay')

@section('content')
    <div class="max-w-2xl mx-auto p-5">
        <h1 class="text-2xl font-bold mb-4 text-center">Create New Inventory Category</h1>

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

        <!-- Add a form for creating a new inventory category -->
        <form method="post" action="{{ route('inventory.categories.store') }}" class="flex flex-col gap-4">
            @csrf

            <div class="mb-4">
                <label for="category_name" class="block text-lg font-semibold text-gray-600">Inventory Category:</label>
                <input type="text" name="category_name" id="category_name" placeholder="Enter inventory category" class="form-input  mt-1 py-3 px-1 outline-none ring-1 ring-blue-600 w-full" value="{{ old('category_name') }}" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Create Category</button>
        </form>
    </div>
@endsection
