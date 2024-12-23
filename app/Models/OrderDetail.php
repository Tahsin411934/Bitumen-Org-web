<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'order_no',
        'itemcode',
        'quantity',
        'uom',
        'price',
    ];

    // Define the relationship with the Order model
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_no', 'order_no');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'itemcode', 'itemcode'); // Assuming `itemcode` is the foreign key
    }
    
    public function inventory()
    {
        return $this->hasMany(Inventory::class, 'itemcode', 'itemcode'); // Correct foreign key and local key
    }
    
}
