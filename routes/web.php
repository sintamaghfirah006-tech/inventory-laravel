<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Jika user mengakses halaman utama (/), otomatis dialihkan ke halaman produk
Route::redirect('/', '/products');

// Resource route otomatis menangani URL untuk index, create, store, dll.
Route::resource('products', ProductController::class);