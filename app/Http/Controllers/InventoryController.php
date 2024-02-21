<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryCategory;
use Illuminate\Http\Request;
// use Maatwebsite\Excel\Facades\Excel;


class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $inventories = Inventory::all();
    $categories = InventoryCategory::all(); // Assuming you have a Category model

    return view('inventory.index', compact('inventories', 'categories'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = InventoryCategory::all(); // Retrieve all categories
        return view('inventory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'units' => 'required|string',
            'notes' => 'nullable|string',
            'stock_in' => 'required|integer',
            'stock_out' => 'required|integer',
            'consumed' => 'required|integer',        
            'category_id' => 'required|exists:inventory_categories,id'
        ]);
    
        Inventory::create([
            'product_name' => $request->input('product_name'),
            'units' => $request->input('units'),
            'notes' => $request->input('notes'),
            'stock_in' => $request->input('stock_in'),
            'stock_out' => $request->input('stock_out'),
            'consumed' => $request->input('consumed'),
            'category_id' => $request->input('category_id')
        ]);
    
        return redirect()->route('inventory.index')->with('success', 'Inventory entry created successfully.');
    }   

        /**
         * Display the specified resource.
         */
        public function show($id)
        {
            $inventory = Inventory::findOrFail($id);

            return view('inventory.show', compact('inventory'));
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            $inventory = Inventory::findOrFail($id); // Assuming 'id' is the primary key of your inventory table
            $categories = InventoryCategory::all(); // Retrieve all categories
            return view('inventory.edit', compact('inventory', 'categories'));
        }



        /**
         * Update the specified resource in storage.
         */
        /**
 * Update the specified resource in storage.
 */
public function update(Request $request, Inventory $inventory)
{
    $request->validate([
        'product_name' => 'required|string|max:255',
        'units' => 'required|string',
        'notes' => 'nullable|string',
        'stock_in' => 'required|integer',
        'stock_out' => 'required|integer',
        'consumed' => 'required|integer',
        'category_id' => 'required|exists:inventory_categories,id'
    ]);

    $inventory->update([
        'product_name' => $request->input('product_name'),
        'units' => $request->input('units'),
        'notes' => $request->input('notes'),
        'stock_in' => $request->input('stock_in'),
        'stock_out' => $request->input('stock_out'),
        'consumed' => $request->input('consumed'),
        'category_id' => $request->input('category_id')
    ]);

    return redirect()->route('inventory.index')->with('success', 'Inventory entry updated successfully.');
}


        /**
 * Remove the specified resource from storage.
 */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();

        return redirect()->route('inventory.index')->with('success', 'Inventory entry deleted successfully.');
    }

        
}
