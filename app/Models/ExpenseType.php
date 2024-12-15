<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseType extends Model
{
    use HasFactory;

    // Optionally, define the table name (if it differs from the plural of the model name)
    protected $table = 'expensetype';
    public $timestamps = false;

    // Define which fields are mass-assignable
    protected $fillable = ['expensename'];
}
