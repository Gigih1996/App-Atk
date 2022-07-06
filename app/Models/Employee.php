<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'departement_id',
    ];

    public function generateNomor()
    {
        $date = date('dmy');
        $employee = Employee::orderBy('id', 'DESC')->first();
        if ($employee) {
            $nomor = Str::substr($employee->id, 6, 3) + 1;
            $nomor = str_pad($nomor, 3, '0', STR_PAD_LEFT);
        } else {
            $nomor = "001";
        }
        return $date . $nomor;
    }

    public function departement()
    {
        return $this->hasOne(Departement::class, 'id', 'departement_id');
    }
}
