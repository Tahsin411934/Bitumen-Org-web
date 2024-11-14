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
        'purchase_no',
        'gross_weight',
        'empty_weight',
        'net_weight',
    ];

    // Disable auto-incrementing if 'challanno' is not an incrementing ID
    public $incrementing = false;

    // Define relationships if needed
    public function deliveryMaster()
    {
        return $this->belongsTo(DeliveryMaster::class, 'challanno', 'challanno');
    }
    
    public function inventory()
    {
        return $this->belongsTo(inventory::class, 'purchase_no', 'purchase_no');
    }
}
