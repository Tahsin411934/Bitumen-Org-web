<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RC extends Model
{
    use HasFactory;

    // Table name (if different from default 'r_c')
    protected $table = 'r_c';

    // Primary key
    protected $primaryKey = 'WeightID';

    // Disable auto-incrementing if WeightID is manually set (not typical for `id`)
    public $incrementing = true;

    // Primary key data type
    protected $keyType = 'int';

    // Fillable fields for mass assignment
    protected $fillable = [
        'WeightType',
        'Challan_no',
        'MaterialDescription',
        'SellerName',
        'SellerAddress',
        'Quantity',
        'BuyerName',
        'BuyerAddress',
        'OperatorName',
        'DriverName',
        'TruckName',
        'GrossWeightDate',
        'GrossWeightTime',
        'GrossWeight',
        'TareWeightDate',
        'TareWeightTime',
        'TareWeight',
        'NetWeight',
    ];

    // Optional: Cast attributes to specific data types
    protected $casts = [
        'GrossWeightDate' => 'date',
        'GrossWeightTime' => 'datetime:H:i:s',
        'TareWeightDate' => 'date',
        'TareWeightTime' => 'datetime:H:i:s',
        'Quantity' => 'decimal:3',
        'GrossWeight' => 'decimal:3',
        'TareWeight' => 'decimal:3',
        'NetWeight' => 'decimal:3',
    ];
}
