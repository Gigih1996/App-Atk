<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = [
            'Toserba Sabar Subur',
            'Toko Haji Mumpung',
            'Tsmart',
            'Toko Maju Mundur',
            'PT.Salamat Sampoerna',
            'PT.Standard Flex'
        ];

        foreach ($product as $key => $value) {
            Product::create(['name' => $value]);
        }
    }
}
