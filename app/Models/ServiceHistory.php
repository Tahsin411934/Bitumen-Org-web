<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceHistory extends Model
{
    use HasFactory;
public $timestamps =false;
    protected $table = 'servicehistory'; // Specify the table name if not plural
    protected $fillable = ['truck_id', 'date', 'service', 'cost'];

    // Define relationships (optional, based on your schema)
    public function truck()
    {
        return $this->belongsTo(Truck::class, 'truckID');
    }
}
