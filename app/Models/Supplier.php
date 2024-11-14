<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $primaryKey = 'supplied_id';
    public $incrementing = true;
    

    protected $fillable = [
        
        'suppliername',
        'address',
        'city',
        'contact_person',
        'mobile',
        'email'
    ];
}
