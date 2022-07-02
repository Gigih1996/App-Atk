<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Role extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'name', 'guard_name'
    ];

    public function kabinet()
    {
        return $this->belongsTo(Kabinet::class, 'roles_id');
    }
}
