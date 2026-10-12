@extends('app')

@section('content')
<div class="card p-4 shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Master Produk (P5 Laravel)</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah Produk</a>
    </div>

    <!-- Form Search, Filter, & Sort -->
    <form action="{{ route('products.index') }}" method="GET" class="row g-2 mb-3">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Cari nama atau SKU..." value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
            <select name="category_id" class="form-select">
                <option value="">-- Semua Kategori --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select name="sort" class="form-select">
                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Urut Nama</option>
                <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Urut Harga</option>
                <option value="stock" {{ request('sort') == 'stock' ? 'selected' : '' }}>Urut Stok</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-secondary w-100">Filter</button>
        </div>
    </form>

    <!-- Notifikasi Sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabel Data -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>SKU</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $prod)
            <tr>
                <td>{{ $prod->sku }}</td>
                <td>{{ $prod->name }}</td>
                <td>{{ $prod->category->name }}</td>
                <td>Rp {{ number_format($prod->price, 0, ',', '.') }}</td>
                <td>{{ $prod->stock }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Data produk tidak ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Tombol Pagination -->
    <div class="mt-2">
        {{ $products->links() }}
    </div>
</div>
@endsection