<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryMaster extends Model
{
    use HasFactory;

    protected $table = 'delivery_master';
    protected $primaryKey = 'challanno'; // Primary key is `challanno`
    public $incrementing = true; // Optional, since `challanno` is auto-incrementing

    protected $fillable = [
        'datetime',
        'orderno',
        'ship_to',
        'address',
        'truck_no',
        'driver',
        'license',
    ];

    // Define the relationship with DeliveryDetail
    public function deliveryDetails()
    {

    //   dd($this->hasMany(DeliveryDetail::class, 'challanno', 'challanno')->get());
        
        return $this->hasMany(DeliveryDetail::class, 'challanno', 'challanno');
    }
}
