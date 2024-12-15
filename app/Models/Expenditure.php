<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    use HasFactory;

    // Define the table name if it does not follow the default naming convention (plural of the model name)
    protected $table = 'expenditure';
    public $timestamps = false;  
    // Define the fillable attributes to prevent mass assignment vulnerabilities
    protected $fillable = [
        'truckid', 'expendituretype', 'description', 'date', 'amount', 'driver_id', 'paidto'
    ];
}
