<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MEBscale extends Model
{
    use HasFactory;

    // Define the table name if it doesn't follow the default naming convention
    protected $table = 'MEB_scale_slips';
protected $timespan= false;
    // Define which attributes are mass assignable
    protected $fillable = [
        'no',
        'date_time',
        'customer_name',
        'goods',
        'vehicle',
        'gross_weight_time',
        'gross_weight_amount',
        'gross_weight_uom',
        'tare_weight_time',
        'tare_weight_amount',
        'tare_weight_uom',
        'price',
        'total_price',
        'company',
        'address',
        'holder',
        'phone',
        'do_no',
    ];

    // Specify any date/time fields
    protected $casts = [
        'date_time' => 'datetime',
        'gross_weight_amount' => 'decimal:3',
        'tare_weight_amount' => 'decimal:3',
        'net_weight' => 'decimal:3',
        'price' => 'decimal:3',   // Updated to decimal with 3 places
        'total_price' => 'decimal:3',   // Updated to decimal with 3 places
    ];

    // If you need to calculate the net weight using accessor
    public function getNetWeightAttribute()
    {
        return number_format($this->gross_weight_amount - $this->tare_weight_amount, 3, '.', '');
    }
}
