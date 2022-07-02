<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class reporting extends Model
{
    use HasFactory;

    public function status()
    {
        return $this->belongsTo(StatusFile::class);
    }

    public function media()
    {
        return $this->belongsTo(MediaArsip::class);
    }

}
