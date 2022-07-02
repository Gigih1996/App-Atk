<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalArsip extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_arsip',
        'archive_id',
        'status_id',
        'role_id',
        'user_id',
        'judul_arsip',
        'upload_file',
        'ext',
        'size',
        'media_id',
        'jenis_id',
        'keterangan'
    ];

    public function archive()
    {
        return $this->belongsTo(Archive::class);
         //Keluar dari aturan laravel 'foreign_key','owner_key' => 'no_kabient', 'id'
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kabinet()
    {
        return $this->belongsTo(Kabinet::class, 'roles_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(StatusFile::class);
    }

    public function media()
    {
        return $this->belongsTo(MediaArsip::class);
    }

    public function arsip_jenis()
    {
        return $this->belongsTo(JenisArsip::class);
    }

    
    
}
