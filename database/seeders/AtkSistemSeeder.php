<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AtkSistemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            UserAdminSeeder::class,
            DepartementSeeder::class,
            ProductSeeder::class,
            TypeSeeder::class,
            UnitSeeder::class
        ]);
    }
}
