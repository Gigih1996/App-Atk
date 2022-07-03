<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit = [
            'Kg',
            'Cm',
            'M',
            'mm',
            'Pcs',
            'Box',
            'Rim',
            'Gross',
            'Kodi',
            'Lusin'
        ];

        foreach ($unit as $key => $value) {
            Unit::create(['name' => $value]);
        }
    }
}
