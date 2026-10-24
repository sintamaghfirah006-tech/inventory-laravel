@extends('app')

@section('content')
<div class="card p-4 shadow-sm" style="max-width: 600px; margin: auto;">
    <h2>Edit Produk</h2>
    
    <!-- Action mengarah ke route update dengan membawa ID Produk -->
    <form action="{{ route('products.update', $product->id) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT') <!-- Wajib di Laravel untuk form edit/update -->

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                <option value="">Pilih Kategori</option>
                @foreach($categories as $cat)
                    <!-- Mengisi data lama atau data dari database -->
                    <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
            @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">SKU (Harus Unik)</label>
            <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror" value="{{ old('sku', $product->sku) }}">
            @error('sku') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Harga (Tidak Boleh Negatif)</label>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}">
            @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Stok (Tidak Boleh Negatif)</label>
            <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $product->stock) }}">
            @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('products.index') }}" class="btn btn-light">Kembali</a>
            <button type="submit" class="btn btn-warning text-white">Perbarui Produk</button>
        </div>
    </form>
</div>
@endsection