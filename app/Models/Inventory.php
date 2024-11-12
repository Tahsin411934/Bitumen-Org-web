<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural form of the model name
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

    // If you are using a composite primary key, you would need to customize the primary key as Laravel uses a single primary key by default
    // protected $primaryKey = ['purchase_no', 'itemcode']; // Composite key (if needed)
}
