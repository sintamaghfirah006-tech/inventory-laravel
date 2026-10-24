

<?php $__env->startSection('content'); ?>
<style>
    .dashboard-header {
        width: 100%;
        margin-bottom: 25px;
        border-bottom: 2px solid #ffe4e1;
        padding-bottom: 15px;
    }
    .header-title {
        float: left;
    }
    .header-buttons {
        float: right;
        margin-top: 5px;
    }
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
    
    .stats-table {
        display: table;
        width: 100%;
        table-layout: fixed;
        border-spacing: 15px 0;
        margin-left: -15px;
        margin-right: -15px;
        margin-bottom: 30px;
    }
    .stat-box {
        display: table-cell;
        color: white;
        padding: 20px;
        border-radius: 8px;
        vertical-align: middle;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }
    /* Variasi Warna Pink Estetik */
    .bg-pink-dark { background-color: #ff1493 !important; }
    .bg-pink-medium { background-color: #ff69b4 !important; }
    .bg-pink-light { background-color: #ff85a2 !important; }
    
    .stat-box h3 {
        margin: 0;
        font-size: 32px;
        font-weight: bold;
    }
    .stat-box span {
        font-size: 14px;
        font-weight: 500;
        display: block;
        margin-top: 5px;
    }
    
    table.data-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }
    table.data-table th, table.data-table td {
        padding: 12px;
        border: 1px solid #ffe4e1;
        text-align: left;
    }
    table.data-table th {
        background-color: #ff69b4;
        color: white;
    }
</style>

<div class="card">
    <div class="dashboard-header clearfix">
        <div class="header-title">
            <h2 class="fw-bold" style="color: #d63384; margin: 0; font-size: 24px;">Dashboard Sistem Gudang 🌸</h2>
            <small class="text-muted">Ringkasan data master dan peringatan stok UTS</small>
        </div>
        <div class="header-buttons">
            <a href="<?php echo e(route('products.index')); ?>" style="background-color: #ff85a2; color: white; padding: 10px 15px; text-decoration: none; border-radius: 6px; font-weight: bold; font-size: 14px; display: inline-block; margin-right: 5px; vertical-align: middle;">
                📦 Kelola Master Produk
            </a>
            
            <form action="<?php echo e(route('logout')); ?>" method="POST" style="margin: 0; display: inline-block; vertical-align: middle;">
                <?php echo csrf_field(); ?>
                <button type="submit" style="background-color: #db7093; color: white; border: none; padding: 10px 15px; border-radius: 6px; cursor: pointer; font-weight: bold; font-size: 14px; height: 38px;">
                    Keluar Aplikasi
                </button>
            </form>
        </div>
    </div>

    <div class="stats-table">
        <div class="stat-box bg-pink-dark">
            <h3><?php echo e($totalProduk); ?></h3>
            <span>Total Produk</span>
        </div>
        <div class="stat-box bg-pink-medium">
            <h3><?php echo e($totalKategori); ?></h3>
            <span>Total Kategori</span>
        </div>
        <div class="stat-box bg-pink-light">
            <h3><?php echo e($totalSupplier); ?></h3>
            <span>Total Supplier</span>
        </div>
    </div>

    <h3 style="color: #ff1493; margin-top: 25px; font-size: 18px; font-weight: bold;">⚠️ Peringatan Stok Menipis</h3>
    <p class="text-muted small" style="margin-bottom: 10px;">Daftar produk yang stoknya sudah mencapai atau di bawah batas minimum:</p>
    
    <table class="data-table">
        <thead>
            <tr>
                <th>SKU</th>
                <th>Nama Produk</th>
                <th>Sisa Stok</th>
                <th>Stok Minimum</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $stokRendah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr style="background-color: #fff0f5;">
                <td style="font-weight: bold; color: #ff1493;"><?php echo e($produk->sku); ?></td>
                <td><?php echo e($produk->name); ?></td>
                <td style="color: #ff1493; font-weight: bold;"><?php echo e($produk->stock); ?></td>
                <td><?php echo e($produk->minimum_stock); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="4" style="text-align: center; color: #8b7b8b; padding: 15px;">Semua stok produk aman dan di atas batas minimum.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\inventory-sales\resources\views/dashboard.blade.php ENDPATH**/ ?>