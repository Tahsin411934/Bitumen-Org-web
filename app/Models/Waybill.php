<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waybill extends Model
{
    use HasFactory;

    // Define the table name (optional if it's the plural form of the model name)
    protected $table = 'waybill';
public $timestamps = false;
    // Define the fillable columns
    protected $fillable = [
        'truckid',
        'date',
        'description',
        'aproximatedistance',
    ];
}
