<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_no'; // Define custom primary key

    protected $fillable = [
        'orderdate',
        'customerid',
        'reference',
        'deliverylocation',
        'address',
        'remark',
        'contact_person',
        'contact_phone',
    ];

    // Define the relationship with OrderDetail
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_no', 'order_no');
    }

   

    // Define the relationship with Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerid', 'customerID');
    }

    
}
