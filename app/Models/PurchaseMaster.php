<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseMaster extends Model
{
    use HasFactory;
    protected $primaryKey = 'purchase_no';  
    public $incrementing = true;  
   
    protected $table = 'purchase_master';

    protected $fillable = [
        'purchase_date',
        'supplier_id',
        'DO_InvoiceNo',
        'remarks',
    ];

    public function details()
    {
        return $this->hasMany(PurchaseDetail::class, 'purchase_no');
    }
}
