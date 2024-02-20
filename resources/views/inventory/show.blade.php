<!-- resources/views/inventory/show.blade.php -->

@extends('layouts.lay')

@section('content')
    <h1>Inventory Details</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Units</th>
                <th>Notes</th>
                <th>Stock In</th>
                <th>Stock Out</th>
                <th>Consumed</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $inventory->id }}</td>
                <td>{{ $inventory->product_name }}</td>
                <td>{{ $inventory->units }}</td>
                <td>{{ $inventory->notes }}</td>
                <td>{{ $inventory->stock_in }}</td>
                <td>{{ $inventory->stock_out }}</td>
                <td>{{ $inventory->consumed }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('inventory.edit', $inventory->id) }}">Edit Inventory Entry</a>
    <!-- Add any other details or actions you want to display -->

    <a href="{{ route('inventory.index') }}">Back to Inventory List</a>
@endsection
