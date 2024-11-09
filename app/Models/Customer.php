<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

   
    protected $table = 'customers';

    
    protected $primaryKey = 'customerID';

    
    public $incrementing = true;

    
    protected $keyType = 'int';

    
    public $timestamps = true;

   
    protected $fillable = [
        'customername',
        'customerType',
        'address',
        'city_district',
        'phone',
        'email',
        'contactperson',
        'contactperson_mobile',
    ];

    
    protected $hidden = [];

    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
