<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Membuat data contoh untuk Kategori
        $elektronik = Category::create(['name' => 'Elektronik']);
        $pakaian = Category::create(['name' => 'Pakaian']);

        // 2. Membuat data contoh untuk Produk yang terhubung ke Kategori di atas
        Product::create([
            'category_id' => $elektronik->id,
            'sku' => 'ELK-001',
            'name' => 'Laptop ASUS',
            'price' => 8500000,
            'stock' => 15
        ]);

        Product::create([
            'category_id' => $pakaian->id,
            'sku' => 'PKN-001',
            'name' => 'Kemeja Flanel',
            'price' => 150000,
            'stock' => 50
        ]);
    }
}