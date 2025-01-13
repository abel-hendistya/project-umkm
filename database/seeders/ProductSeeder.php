<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Data dummy
        Product::create(['name' => 'Product 1', 'price' => 100, 'stock' => 50, 'category' => 'Category A']);
        Product::create(['name' => 'Product 2', 'price' => 200, 'stock' => 30, 'category' => 'Category B']);
        Product::create(['name' => 'Product 3', 'price' => 150, 'stock' => 20, 'category' => 'Category C']);
    }
}
