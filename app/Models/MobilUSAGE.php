<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobilUSAGE extends Model
{
    use HasFactory;
    
    protected $table = 'mobilusage';
    protected $primaryKey = 'id'; 
    public $incrementing = true;
    public $timestamps = false;  
    protected $fillable = [
        'id',
        'truckID',
        'changedate',
    ];
}
