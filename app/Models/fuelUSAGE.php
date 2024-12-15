<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fuelUSAGE extends Model
{
    use HasFactory;
    protected $table = 'fuelusage';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false; 
    protected $fillable = [
        'truckid',
        'date',
        'quantity',
        'fillingstation',
        'driver',
        'meterREADING',
    ];
}
