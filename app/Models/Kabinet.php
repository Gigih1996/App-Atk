<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Permission\Models\Role;

class Kabinet extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nomor_kabinet',
        'roles_id',
        'nama_kabinet',
        'uraian',
        'keterangan'
    ];

    public function role(){
        return $this->hasOne(Role::class);
    }

    
}
