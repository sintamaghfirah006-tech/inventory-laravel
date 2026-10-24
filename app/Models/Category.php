<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    // Mengizinkan kolom 'name' untuk diisi data
    protected $fillable = ['name'];

    // Relasi: Category memiliki banyak Product (hasMany)
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}