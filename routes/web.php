<?php
namespace App\Http\Controllers;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('inventory.index');
// });

// Inventory routes
Route::get('/', [InventoryController::class, 'index'])->name('inventory.index');
Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');
Route::get('/inventory/{inventory}', [InventoryController::class, 'show'])->name('inventory.show');
// Route::get('/inventory/{inventory}/edit', [InventoryController::class, 'edit'])->name('inventory.edit');
Route::get('/inventory/{inventory}/edit', [InventoryController::class, 'edit'])->name('inventory.edit');
// Route::post('/inventory/upload', 'InventoryContro ller@upload')->name('inventory.upload');
Route::put('/inventory/{inventory}', [InventoryController::class, 'update'])->name('inventory.update');
Route::delete('/inventory/{inventory}', [InventoryController::class, 'destroy'])->name('inventory.destroy');


Route::get('/categories', [InventoryCategoryController::class, 'index'])->name('inventory.categories');
Route::get('/inventory/categories/create', [InventoryCategoryController::class, 'create'])->name('inventory.categories.create');
Route::post('/inventory/categories', [InventoryCategoryController::class, 'store'])->name('inventory.categories.store');
Route::get('/inventory/category/{id}', [InventoryCategoryController::class, 'show'])->name('inventory.category.show');
Route::get('/inventory/categories/{id}/edit', [InventoryCategoryController::class, 'edit'])->name('inventory.category.edit');
Route::post('/inventory/categories/update', [InventoryCategoryController::class, 'update'])->name('inventory.categories.update');
Route::delete('inventory/categories/{category}', [InventoryCategoryController::class, 'destroy'])->name('inventory.categories.destroy');


// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Product routes
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

// Other routes


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
