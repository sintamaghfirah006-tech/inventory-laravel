

<?php $__env->startSection('content'); ?>
<div style="max-width: 600px; margin: 30px auto; padding: 25px; background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
    <h2 style="color: #333; margin-top: 0; margin-bottom: 20px;">Tambah Kategori Baru</h2>

    <?php if($errors->any()): ?>
        <div style="background: #f8d7da; color: #721c24; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('categories.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #555;">Nama Kategori</label>
            <input type="text" name="name" placeholder="Contoh: Elektronik, Aksesoris" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px; box-sizing: border-box;">
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" style="background: #e83e8c; color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold; cursor: pointer;">Simpan</button>
            <a href="<?php echo e(route('categories.index')); ?>" style="background: #6c757d; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none;">Batal</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\inventory-sales\resources\views/categories/create.blade.php ENDPATH**/ ?>