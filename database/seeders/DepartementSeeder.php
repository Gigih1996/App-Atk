<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $departement = [
            'Keuangan dan Accounting',
            'Gudang Plan 1',
            'Gudang Plan 2',
            'Produksi Plan 1',
            'Produksi Plan 2',
            'Offset',
            'Innet Sales',
            'Design & QC',
            'PPC'
        ];

        foreach ($departement as $key => $value) {
            Departement::create(['name' => $value]);
        }
    }
}
