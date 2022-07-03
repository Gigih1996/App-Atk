<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = [
            'In',
            'Out'
        ];

        foreach ($type as $key => $value) {
            Type::create(['name' => $value]);
        }
    }
}
