<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'category_id' => 1,
            'code' => 'S001',
            'name' => 'Beras 5 Kg',
            'unit' => 'pcs',
            'price' => 75000,
            'stock' => 20,
        ]);

        Product::create([
            'category_id' => 2,
            'code' => 'M001',
            'name' => 'Air Mineral',
            'unit' => 'botol',
            'price' => 5000,
            'stock' => 50,
        ]);

        Product::create([
            'category_id' => 3,
            'code' => 'MK001',
            'name' => 'Chitato',
            'unit' => 'pcs',
            'price' => 12000,
            'stock' => 30,
        ]);

        Product::create([
            'category_id' => 4,
            'code' => 'RT001',
            'name' => 'Sabun Mandi',
            'unit' => 'pcs',
            'price' => 4000,
            'stock' => 25,
        ]);
    }
}