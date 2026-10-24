

<?php $__env->startSection('content'); ?>
<div style="max-width: 900px; margin: 30px auto; padding: 20px; background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
    
    <div style="margin-bottom: 20px;">
        <h2 style="color: #333; margin: 0;">Daftar Kategori</h2>
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
                <th style="padding: 12px;">Nama Kategori</th>
                <th style="padding: 12px; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr style="border-bottom: 1px solid #eee;">
                <td style="padding: 12px;"><?php echo e($loop->iteration); ?></td>
                <td style="padding: 12px; font-weight: 500;"><?php echo e($category->name); ?></td>
                <td style="padding: 12px; text-align: center;">
                    <form action="<?php echo e(route('categories.destroy', $category->id)); ?>" method="POST" onsubmit="return confirm('Yakin mau hapus kategori ini?')" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" style="background: #dc3545; color: white; border: none; padding: 6px 12px; border-radius: 6px; cursor: pointer;">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="3" style="text-align: center; padding: 20px; color: #888;">Belum ada data kategori.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Disesuaikan ke 70px agar pas lurus vertikal dengan tombol hapus -->
    <div style="display: flex; justify-content: flex-end; margin-top: 20px; padding-right: 70px;">
        <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-primary">+ Tambah Kategori</a>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\inventory-sales\resources\views/categories/index.blade.php ENDPATH**/ ?>