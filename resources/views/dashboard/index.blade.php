<!-- resources/views/dashboard/index.blade.php -->

@extends('layouts.lay')

@section('content')
    <h1 class="text-2xl font-bold mb-4 text-center p-10">Dashboard</h1>

    <div class="grid grid-cols-2 gap-4">
        <div class="bg-white p-6 rounded-md shadow-md">
            {!! $chart->html() !!}
        </div>

        <div class="bg-white p-6 rounded-md shadow-md">
            <h2 class="text-lg font-semibold mb-4">Recent Activities</h2>
            <ul>
                @foreach ($recentActivities as $activity)
                    <li>{{ $activity->product_name }} - {{ $activity->created_at->diffForHumans() }}</li>
                @endforeach
            </ul>
        </div>

        <div class="bg-white p-6 rounded-md shadow-md">
            <h2 class="text-lg font-semibold mb-4">Key Statistics</h2>
            <p>Total Inventory Count: {{ $inventoryCount }}</p>
            <p>Total Category Count: {{ $categoryCount }}</p>
            <!-- Add other key statistics as needed -->
        </div>

        <!-- Add more sections for other information as needed -->

    </div>

    {!! $chart->script() !!}
@endsection
