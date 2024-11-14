<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'itemcode'; // Custom primary key

    public $incrementing = true; // Specify if `itemcode` is auto-incrementing

    protected $keyType = 'int'; // Ensure Laravel knows this is an integer primary key

    protected $fillable = ['itemname', 'uom']; 
    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'itemcode', 'itemcode');  // Each product can appear in multiple inventory records
    }
}
