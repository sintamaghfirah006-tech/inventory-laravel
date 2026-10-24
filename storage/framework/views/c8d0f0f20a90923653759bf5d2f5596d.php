

<?php $__env->startSection('content'); ?>
<div class="card p-4 shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Riwayat Transaksi Penjualan (Stock-Out)</h2>
        <!-- Tombol untuk menuju ke halaman input transaksi baru -->
        <a href="<?php echo e(route('sales.create')); ?>" class="btn btn-primary">Mulai Transaksi Baru</a>
    </div>

    <!-- Notifikasi Sukses / Gagal -->
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <!-- Tabel Data Transaksi -->
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>No. Transaksi</th>
                <th>Kasir / Staf</th>
                <th>Tanggal Transaksi</th>
                <th>Total Belanja</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td class="fw-bold text-primary"><?php echo e($sale->sale_number); ?></td>
                <td><?php echo e($sale->user->name ?? 'Tidak Diketahui'); ?></td>
                <td><?php echo e($sale->sold_at ? $sale->sold_at->format('d M Y H:i') : '-'); ?></td>
                <td>Rp <?php echo e(number_format($sale->total, 0, ',', '.')); ?></td>
                <td>
                    <span class="badge bg-success text-capitalize"><?php echo e($sale->status); ?></span>
                </td>
                <td>
                    <!-- Tombol Detail untuk melihat barang apa saja yang dibeli -->
                    <a href="<?php echo e(route('sales.show', $sale->id)); ?>" class="btn btn-info btn-sm text-white">Detail</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="6" class="text-center">Belum ada riwayat transaksi penjualan.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Navigasi Pembagian Halaman (Pagination) -->
    <div class="mt-2">
        <?php echo e($sales->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\inventory-sales\resources\views/sales/index.blade.php ENDPATH**/ ?>