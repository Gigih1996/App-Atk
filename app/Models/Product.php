<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'unit_id',
        'type_id',
        'stock'
    ];

    public function unit()
    {
        $this->hasOne(Unit::class, 'id', 'unit_id');
    }

    public function type()
    {
        $this->hasOne(Type::class, 'id', 'type_id');
    }
}
