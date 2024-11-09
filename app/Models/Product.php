<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'itemcode'; // Custom primary key

    public $incrementing = true; // Specify if `itemcode` is auto-incrementing

    protected $keyType = 'int'; // Ensure Laravel knows this is an integer primary key

    protected $fillable = ['itemname', 'uom']; // Define fillable fields
}
