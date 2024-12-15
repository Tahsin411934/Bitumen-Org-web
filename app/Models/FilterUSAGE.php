<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterUSAGE extends Model
{
    use HasFactory;
    protected $table = 'filterusage';
    protected $primaryKey = 'id'; 
    public $incrementing = true;
    public $timestamps = false;  
    protected $fillable = [
        'id',
        'truckID',
        'changedate',
    ];
}
