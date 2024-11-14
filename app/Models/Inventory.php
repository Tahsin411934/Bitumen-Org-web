<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

   
    protected $table = 'inventory'; // Optional if the table is 'inventory'
    protected $primaryKey = 'id';
    // Allow mass assignment for these fields
    protected $fillable = [
        'id',
        'purchase_no',
        'itemcode',
        'do_invoice_no',
        'quantity',
        'sold_quantity',
        'remaining_quantity',
        'uom',
        'price',
        'location',
        'status',
    ];

    // Optionally, if you have timestamps enabled, you can add this
    public $timestamps = true;  // This is enabled by default in Laravel, so it's optional.

    public function orderDetail()
    {
        return $this->belongsTo(OrderDetail::class, 'itemcode', 'itemcode'); // Assuming 'itemcode' is the foreign key
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'itemcode', 'itemcode');  // Each inventory item is linked to one product
    }
}
