

<?php $__env->startSection('content'); ?>
<div class="card p-4 shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Master Produk (P5 Laravel)</h2>
        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">Tambah Produk</a>
    </div>

    <!-- Form Search, Filter, & Sort -->
    <form action="<?php echo e(route('products.index')); ?>" method="GET" class="row g-2 mb-3">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Cari nama atau SKU..." value="<?php echo e(request('search')); ?>">
        </div>
        <div class="col-md-3">
            <select name="category_id" class="form-select">
                <option value="">-- Semua Kategori --</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat->id); ?>" <?php echo e(request('category_id') == $cat->id ? 'selected' : ''); ?>><?php echo e($cat->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-3">
            <select name="sort" class="form-select">
                <option value="name" <?php echo e(request('sort') == 'name' ? 'selected' : ''); ?>>Urut Nama</option>
                <option value="price" <?php echo e(request('sort') == 'price' ? 'selected' : ''); ?>>Urut Harga</option>
                <option value="stock" <?php echo e(request('sort') == 'stock' ? 'selected' : ''); ?>>Urut Stok</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-secondary w-100">Filter</button>
        </div>
    </form>

    <!-- Notifikasi Sukses -->
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

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
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($prod->sku); ?></td>
                <td><?php echo e($prod->name); ?></td>
                <td><?php echo e($prod->category->name); ?></td>
                <td>Rp <?php echo e(number_format($prod->price, 0, ',', '.')); ?></td>
                <td><?php echo e($prod->stock); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="5" class="text-center">Data produk tidak ditemukan.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Tombol Pagination -->
    <div class="mt-2">
        <?php echo e($products->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\inventory-laravel\resources\views/products/index.blade.php ENDPATH**/ ?>