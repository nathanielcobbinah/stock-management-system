<?php

namespace App\Http\Controllers;

use App\Models\InventoryCategory;
use Illuminate\Http\Request;

class InventoryCategoryController extends Controller
{
    public function index() 
    {
        $categories = InventoryCategory::all();
        return view('inventory.categories', compact('categories'));
    }

    public function create() 
    {
        return view('inventory.create_categories');
    }


    public function store(Request $request) 
    {
        $request->validate([
            'category_name' => 'required|string|max:255'
        ]);

        InventoryCategory::create([
            'category_name' => $request->input('category_name')
        ]);
        
        return redirect()->route('inventory.categories')->with('success', 'Category added successfully');
    }

    public function show($id) 
    {
        $category = InventoryCategory::findOrFail($id);
        return view('inventory.category_show', compact('category'));
    }

    public function edit($id)
    {
        $category = InventoryCategory::findOrFail($id);
        return view('inventory.category_edit', compact('category'));
    }

    public function update(Request $request, InventoryCategory $category)
    {
        $request->validate([
            'category_name' => 'required|string|max:255'
        ]);

        $category->update([
            'category_name' => $request->input('category_name')
        ]);

    return redirect()->route('inventory.categories')->with('success', 'Inventory entry updated successfully.');
    }

    public function destroy($id)
    {
        $category = InventoryCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('inventory.categories.index')->with('success', 'Category deleted successfully');
    }
    
}
