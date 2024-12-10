<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryDetail extends Model
{
    use HasFactory;

    // Define the table name (in case it doesn't follow Laravel's naming convention)
    protected $table = 'delivery_details';

    // Define the primary key if it's different from 'id'


    // Allow mass assignment on these attributes
    protected $fillable = [
        'challanno',
        'itemcode',
        'gross_weight',
        'empty_weight',
        'net_weight',
    ];

    // Disable auto-incrementing if 'challanno' is not an incrementing ID
    public $incrementing = false;

    // Define relationships if needed
    public function deliveryMaster()
    {
        dd($this->belongsTo(DeliveryMaster::class, 'challanno', 'challanno')->get());
        return $this->belongsTo(DeliveryMaster::class, 'challanno', 'challanno');
    }
    
    public function inventory()
    {
       
        return $this->belongsTo(inventory::class, 'purchase_no', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'itemcode', 'itemcode');  // Each inventory item is linked to one product
    }

   
}
