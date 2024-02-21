<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased text-gray-400" >
    <div class="min-h-screen bg-gradient-to-b from-black via-blue-950 to-black p-3">
        <!-- Navigation Bar -->
        <nav class="flex items-center justify-between p-4 bg-gray-800">
            <div>
                <a href="{{ url('/') }}" class="text-white text-2xl font-bold">STOCK</a>
            </div>
            <div class="space-x-4">
                <a href="{{ route('inventory.index') }}" class="text-white hover:underline">Inventory</a>
                <a href="{{ route('inventory.categories') }}" class="text-white hover:underline">Category</a>
                <!-- Add more navigation links as needed -->
            </div>
        </nav>

        <!-- Page Content -->
        <main class="mt-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
