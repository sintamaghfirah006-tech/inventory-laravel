

<?php $__env->startSection('content'); ?>
<!-- Tambahan CSS agar isi dropdown ikut bernuansa pink -->
<style>
    select option {
        background-color: #fff0f5; /* Latar belakang pink soft */
        color: #d63384; /* Warna tulisan pink tua */
    }
    select option:hover, select option:checked {
        background-color: #ff69b4 !important; /* Warna saat disorot/dipilih */
        color: white !important;
    }
</style>

<div class="card p-4 shadow-sm" style="max-width: 1000px; margin: 30px auto;">
    <div class="d-flex" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; border-bottom: 2px solid #ffe4e1; padding-bottom: 15px;">
        <div>
            <h2 class="fw-bold" style="color: #d63384; margin: 0;">Data Master Produk 🌸</h2>
            <small class="text-muted">Kelola informasi barang, harga beli, harga jual, dan stok gudang</small>
        </div>
        <div>
            <a href="<?php echo e(route('dashboard')); ?>" style="background-color: #db7093; color: white; padding: 10px 15px; text-decoration: none; border-radius: 6px; font-weight: bold; font-size: 14px; margin-right: 5px; display: inline-block;">
                ⬅️ Kembali ke Dashboard
            </a>
            <a href="<?php echo e(route('products.create')); ?>" style="background-color: #ff1493; color: white; padding: 10px 15px; text-decoration: none; border-radius: 6px; font-weight: bold; font-size: 14px; display: inline-block;">
                ➕ Tambah Produk
            </a>
        </div>
    </div>

    <!-- NOTIFIKASI SUKSES -->
    <?php if(session('success')): ?>
        <div class="alert alert-success p-2 small mb-3" style="color: #d63384; background-color: #fff0f5; border: 1px solid #ffb6c1; border-radius: 6px; padding: 10px;">
            <b>Sukses!</b> <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- FORM SEARCH & FILTER -->
    <form action="<?php echo e(route('products.index')); ?>" method="GET" style="display: flex; gap: 10px; margin-bottom: 20px;">
        <div style="flex: 2;">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan SKU atau Nama..." value="<?php echo e(request('search')); ?>">
        </div>
        <div style="flex: 1;">
            <select name="category_id" class="form-control" style="height: 100%;">
                <option value="" style="background-color: #fff0f5; color: #d63384;">- Semua Kategori -</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat->id); ?>" <?php echo e(request('category_id') == $cat->id ? 'selected' : ''); ?>><?php echo e($cat->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div>
            <button type="submit" style="background-color: #ff69b4; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; height: 100%;">
                Cari & Filter
            </button>
        </div>
    </form>

    <!-- TABEL MASTER PRODUK -->
    <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
        <thead>
            <tr style="background-color: #ff69b4; color: white;">
                <th style="padding: 12px; border: 1px solid #ffe4e1;">SKU</th>
                <th style="padding: 12px; border: 1px solid #ffe4e1;">Nama Produk</th>
                <th style="padding: 12px; border: 1px solid #ffe4e1;">Kategori</th>
                <th style="padding: 12px; border: 1px solid #ffe4e1;">Harga Beli</th>
                <th style="padding: 12px; border: 1px solid #ffe4e1;">Harga Jual</th>
                <th style="padding: 12px; border: 1px solid #ffe4e1;">Stok</th>
                <th style="padding: 12px; border: 1px solid #ffe4e1;">Min. Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr style="background-color: #fff9fa;">
                <td style="padding: 12px; border: 1px solid #ffe4e1; font-weight: bold; color: #d63384;"><?php echo e($prod->sku); ?></td>
                <td style="padding: 12px; border: 1px solid #ffe4e1;"><?php echo e($prod->name); ?></td>
                <td style="padding: 12px; border: 1px solid #ffe4e1;"><span style="background-color: #ffe4e1; color: #d63384; padding: 3px 8px; border-radius: 4px; font-size: 12px; font-weight: 500;"><?php echo e($prod->category->name); ?></span></td>
                <td style="padding: 12px; border: 1px solid #ffe4e1;">Rp <?php echo e(number_format($prod->purchase_price, 0, ',', '.')); ?></td>
                <td style="padding: 12px; border: 1px solid #ffe4e1; font-weight: bold; color: #e91e63;">Rp <?php echo e(number_format($prod->selling_price, 0, ',', '.')); ?></td>
                <td style="padding: 12px; border: 1px solid #ffe4e1; font-weight: bold;"><?php echo e($prod->stock); ?></td>
                <td style="padding: 12px; border: 1px solid #ffe4e1; color: #7f8c8d;"><?php echo e($prod->minimum_stock); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="7" style="padding: 20px; border: 1px solid #ffe4e1; text-align: center; color: #8b7b8b;">Data produk tidak ditemukan.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- PAGINATION -->
    <div style="margin-top: 20px;">
        <?php echo e($products->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\inventory-sales\resources\views/products/index.blade.php ENDPATH**/ ?>