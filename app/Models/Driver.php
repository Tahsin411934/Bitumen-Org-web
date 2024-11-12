<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'drivers';

    // Define the primary key for the table
    protected $primaryKey = 'driver_id';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'name',
        'license_no',
        'nid_no',
        'contact_no',
        'truck_id', // Foreign key column
    ];

    // Define the relationship with the Truck model
    public function truck()
    {
        return $this->belongsTo(Truck::class, 'truck_id', 'truck_id');
    }
}
