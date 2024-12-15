<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverTruck extends Model
{
    use HasFactory;

    protected $table = 'drivertruck';  // Ensure this matches the table name in the database
    public $timestamps = false;  
    protected $fillable = [
        'truck_id',
        'driver_id',
        'start_date',
        'end_date',
    ];
}
