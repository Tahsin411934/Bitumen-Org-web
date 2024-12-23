<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'trucks';

    // Define the primary key for the table
    protected $primaryKey = 'truck_id';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'reg_no',
        'capacity',
        'type',
        'brand',
        'year',
        'chassis_no',
        'tier_count',
        'tier_size',
        'mileage',
        'status',
        'fuel_type',
        'docRenewDate',
    ];

    // Define the relationship with the Driver model
    public function drivers()
    {
        return $this->hasMany(Driver::class, 'truck_id', 'truck_id');
    }
    public function services()
    {
        return $this->hasMany(ServiceHistory::class, 'truck_id', 'truck_id');
    }
    public function filter()
    {
        return $this->hasMany(FilterUSAGE::class, 'truckID', 'truck_id');
    }
    public function fuel()
    {
        return $this->hasMany(fuelUSAGE::class, 'truckID', 'truck_id');
    }
    public function waybills()
    {
        return $this->hasMany(Waybill::class, 'truckID', 'truck_id');
    }
}
