

<?php $__env->startSection('content'); ?>
<div style="max-width: 900px; margin: 30px auto; padding: 20px; background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
    
    <div style="margin-bottom: 20px;">
        <h2 style="color: #333; margin: 0;">Daftar Supplier</h2>
    </div>

    <?php if(session('success')): ?>
        <div style="background: #d4edda; color: #155724; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <table style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead>
            <tr style="border-bottom: 2px solid #eee;">
                <th style="padding: 12px;">No</th>
                <th style="padding: 12px;">Nama Supplier</th>
                <th style="padding: 12px;">Telepon</th>
                <th style="padding: 12px;">Email</th>
                <th style="padding: 12px; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr style="border-bottom: 1px solid #eee;">
                <td style="padding: 12px;"><?php echo e($loop->iteration); ?></td>
                <td style="padding: 12px; font-weight: 500;"><?php echo e($supplier->name); ?></td>
                <td style="padding: 12px;"><?php echo e($supplier->phone); ?></td>
                <td style="padding: 12px;"><?php echo e($supplier->email); ?></td>
                <td style="padding: 12px; text-align: center;">
                    <form action="<?php echo e(route('suppliers.destroy', $supplier->id)); ?>" method="POST" onsubmit="return confirm('Yakin mau hapus supplier ini?')" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" style="background: #dc3545; color: white; border: none; padding: 6px 12px; border-radius: 6px; cursor: pointer;">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="5" style="text-align: center; padding: 20px; color: #888;">Belum ada data supplier.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- TOMBOL TAMBAH DI POJOK KANAN BAWAH TABEL -->
    <div style="display: flex; justify-content: flex-end; margin-top: 20px;">
        <a href="<?php echo e(route('suppliers.create')); ?>" class="btn btn-primary">+ Tambah Supplier</a>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\inventory-sales\resources\views/suppliers/index.blade.php ENDPATH**/ ?>