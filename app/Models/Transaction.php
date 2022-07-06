<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    function topRequestor(){
        $query = DB::select("SELECT d.name, COUNT(total) as qty, (COUNT(total)/(SELECT COUNT(total) FROM sks_atk.transactions t2  WHERE type='Out')*100) as persen  FROM sks_atk.transactions t JOIN sks_atk.departements d ON d.id=t.departement_id 
        WHERE t.`type` ='Out'
        GROUP BY d.id
        ORDER BY qty DESC 
        LIMIT 5"
        );
        
        return $query;
    }

    function getCountTransactionDivisi(){
        return $this->where(['type'=>'out'])->groupBy('departement_id')->count();
    }

    function getCountTransactionEmployee(){
        return $this->where(['type'=>'out'])->groupBy('employee_id')->count(); 
    }
}
