<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Membuat Data Kategori Default untuk Inventaris (Hanya menggunakan Name)
        $categories = [
            ['name' => 'Elektronik'],
            ['name' => 'Pakaian'],
            ['name' => 'Makanan & Minuman'],
            ['name' => 'Alat Tulis'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // 2. Membuat Data Produk Dummy Otomatis Menggunakan Looping
        $elektronikId = Category::where('name', 'Elektronik')->first()->id;
        $pakaianId = Category::where('name', 'Pakaian')->first()->id;
        $makananId = Category::where('name', 'Makanan & Minuman')->first()->id;

        Product::create([
            'category_id' => $elektronikId,
            'sku' => 'SKU-ELEX-001',
            'name' => 'Laptop Asus ROG',
            'price' => 15000000,
            'stock' => 10,
        ]);

        Product::create([
            'category_id' => $pakaianId,
            'sku' => 'SKU-CLTH-001',
            'name' => 'Kemeja Flannel Uniqlo',
            'price' => 299000,
            'stock' => 50,
        ]);

        Product::create([
            'category_id' => $makananId,
            'sku' => 'SKU-FOOD-001',
            'name' => 'Indomie Goreng 1 Dus',
            'price' => 115000,
            'stock' => 100,
        ]);

        Product::create([
            'category_id' => $elektronikId,
            'sku' => 'SKU-ELEX-002',
            'name' => 'Mouse Wireless Logitech',
            'price' => 150000,
            'stock' => 25,
        ]);
    }
}