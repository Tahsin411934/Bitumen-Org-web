<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slipscale extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'slipscale';

    // The primary key associated with the table.
    protected $primaryKey = 'slipno';

    // Indicates if the model should be timestamped.
    public $timestamps = true;

    // The attributes that are mass assignable.
    protected $fillable = [
        'orderno',
        'plant',
        'ticketno',
        'first_weight_date',
        'first_weight_time',
        'first_weight_ref',
        'second_weight_date',
        'second_weight_time',
        'second_weight_ref',
        'duration_on_site',
        'operator',
        'vehicle_regi',
        'customer',
    ];

    // The attributes that should be cast to native types.
 

    // Optionally, you can define relationships if needed
    // public function order()
    // {
    //     return $this->belongsTo(Order::class, 'orderno');
    // }
}
