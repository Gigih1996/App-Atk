<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusFile extends Model
{
    use HasFactory;

    protected $fillable = ['nama_status'];

    // public function digital_arsip()
    // {
    //     return $this->belongsTo(DigitalArsip::class);
    // }
}
