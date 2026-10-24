

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h2 style="color: #c04f87;">♡ Detail Transaksi Penjualan</h2>
    <p>Informasi lengkap transaksi penjualan.</p>

    <div class="card p-4 mt-3">
        <p>
            <strong>No. Transaksi:</strong>
            <?php echo e($sale->sale_number); ?>

        </p>

        <p>
            <strong>Kasir / Staf:</strong>
            <?php echo e($sale->user->name ?? 'Owner Admin'); ?>

        </p>

        <p>
            <strong>Tanggal Transaksi:</strong>
            <?php echo e($sale->sold_at); ?>

        </p>

        <p>
            <strong>Status:</strong>
            <?php echo e($sale->status); ?>

        </p>

        <hr>

        <h5>Daftar Barang</h5>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $sale->saleItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <?php echo e($item->product->name ?? $item->product->nama_produk ?? 'Produk'); ?>

                            </td>
                            <td><?php echo e($item->quantity); ?></td>
                            <td>Rp <?php echo e(number_format($item->unit_price, 0, ',', '.')); ?></td>
                            <td>Rp <?php echo e(number_format($item->subtotal, 0, ',', '.')); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="text-center">
                                Belum ada detail barang untuk transaksi ini.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total Belanja</th>
                        <th>Rp <?php echo e(number_format($sale->total, 0, ',', '.')); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <a href="<?php echo e(route('sales.index')); ?>"
           class="btn btn-secondary mt-3">
            ← Kembali ke Riwayat Penjualan
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\inventory-sales\resources\views/sales/show.blade.php ENDPATH**/ ?>