<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;

    // Specify the table name if it's not following Laravel's naming convention
    protected $table = 'purchase_detail';  // You can change it to 'purchase_details' if you prefer

    protected $fillable = [
        'purchase_no',
        'itemcode',
        'quantity',
        'uom',
        'price',
        'storage_location',
    ];

    /**
     * Define the relationship with the PurchaseMaster model.
     */
    public function purchaseMaster()
    {
        // Ensure that 'purchase_no' is the foreign key to the PurchaseMaster model's primary key (usually 'id')
        return $this->belongsTo(PurchaseMaster::class, 'purchase_no', 'purchase_no'); // You can change 'purchase_no' to the primary key name if it's different
    }
}
