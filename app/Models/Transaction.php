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


    function updateStok($param){
        $product = Product::find($param['product_id']);
        $product->stock = $param['type']=='In' ? $product->stock+$param['total'] : $product->stock-$param['total'];
        return $product->save();
    }
}
