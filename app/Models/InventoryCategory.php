<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
    ];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
