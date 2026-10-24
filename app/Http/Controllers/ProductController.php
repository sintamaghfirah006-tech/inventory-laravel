<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 1. MENAMPILKAN DAFTAR PRODUK (Include Search, Filter, Sort, Paginate)
    public function index(Request $request)
    {
        $query = Product::with('category');

        // Fitur Search (Berdasarkan Nama atau SKU)
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('sku', 'like', '%' . $request->search . '%');
            });
        }

        // Fitur Filter (Berdasarkan Kategori)
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Fitur Sorting Berizin (Mengikuti Business Rules P4 agar kolom aman)
        $allowedSort = ['name', 'price', 'stock'];
        $sortBy = in_array($request->sort, $allowedSort) ? $request->sort : 'created_at';
        $sortOrder = $request->order === 'desc' ? 'desc' : 'asc';
        $query->orderBy($sortBy, $sortOrder);

        // Fitur Pagination (Membatasi data per halaman)
        $products = $query->paginate(10)->withQueryString();
        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }

    // 2. MENAMPILKAN FORM TAMBAH PRODUK
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // 3. MEMPROSES SIMPAN DATA (Include Validasi Server-Side)
    public function store(Request $request)
    {
        // Validasi Aturan Bisnis P4: SKU unik, harga & stok tidak boleh negatif (min:0)
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'sku'         => 'required|string|unique:products,sku',
            'name'        => 'required|string|max:255',
            'price'       => 'required|integer|min:0', 
            'stock'       => 'required|integer|min:0', 
        ]);

        // Simpan ke Database
        Product::create($request->all());

        // Alur Lengkap: Membuka Form -> Validasi -> Simpan -> Redirect -> Tampilkan Data
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // 4. MENAMPILKAN FORM EDIT PRODUK BERDASARKAN ID
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // 5. MEMPROSES UPDATE / PERUBAHAN DATA PRODUK
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validasi data yang diubah (SKU unik dikecualikan untuk ID produk ini sendiri)
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'sku'         => 'required|string|unique:products,sku,' . $product->id,
            'name'        => 'required|string|max:255',
            'price'       => 'required|integer|min:0', 
            'stock'       => 'required|integer|min:0', 
        ]);

        // Update data di database
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // 6. MENGHAPUS DATA PRODUK DARI DATABASE
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}