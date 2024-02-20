<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'inventory_id',
        'product_name',
        'units',
        'notes',
        'stock_in',
        'stock_out',
        'consumed'
    ];
}
