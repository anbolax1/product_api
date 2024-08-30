<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductProperty;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $product = Product::create(
                [
                    'name' => 'Товар ' . $i,
                    'price' => rand(100, 1000),
                    'quantity' => rand(1, 50),
                ]
            );

            ProductProperty::create(
                [
                    'product_id' => $product->id,
                    'property_name' => 'color',
                    'property_value' => ['red', 'blue', 'yellow', 'violet', 'black', 'white'][rand(0, 5)],
                ]
            );
            ProductProperty::create(
                [
                    'product_id' => $product->id,
                    'property_name' => 'brand',
                    'property_value' => ['Brand 1', 'Brand 2', 'Brand 3', 'Brand 4', 'Brand 5', 'Brand 6', 'Brand 7'][rand(0, 1)],
                ]
            );
        }
    }
}
