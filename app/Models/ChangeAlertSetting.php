<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeAlertSetting extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'changealertsetting';

    // Specify the primary key (if it's not 'id')
    protected $primaryKey = 'id';

    // Indicate that the primary key is not auto-incrementing
    public $incrementing = false;

    // Define the fillable attributes
    protected $fillable = ['id', 'item', 'duration', 'uom'];

    // If timestamps are not used
    public $timestamps = false;
}
