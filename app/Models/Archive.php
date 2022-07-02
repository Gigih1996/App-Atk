<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_berkas',
        'no_kabinet',
        'no_roles',
        'nama_berkas',
        'uraian',
        'keterangan'
    ];

    public function kabinet()
    {
        return $this->belongsTo(Kabinet::class);
        // return $this->belongsTo(Kabinet::class, 'nomor_kabinet', 'id');
    }
    
}
