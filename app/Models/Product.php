<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    // Mengizinkan kolom-kolom ini diisi data (Menghindari Mass Assignment Error)
    protected $fillable = ['category_id', 'sku', 'name', 'price', 'stock'];

    // Kebalikan Relasi: Product dimiliki oleh Category (belongsTo)
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}