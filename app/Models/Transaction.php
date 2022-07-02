<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'product_id',
        'unit_id',
        'total',
        'department_id',
        'date',
        'type',
        'supplier_id'
    ];
}
