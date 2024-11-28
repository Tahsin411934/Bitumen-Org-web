<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryLedger extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'inventory_ledger';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'trxid';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'int';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'itemcode',
        'DO_no',
        'quantity',
        'uom',
        'challan_no',
        'order_no',
        'status',
        'customer_id',
        'supplied_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customerID');
    }
    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplied_id', 'supplied_id');
    }
    public function products()
    {
        return $this->belongsTo(Product::class, 'itemcode', 'itemcode');
    }
}
