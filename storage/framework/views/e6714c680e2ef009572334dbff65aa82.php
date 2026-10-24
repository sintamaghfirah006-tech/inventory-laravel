

<?php $__env->startSection('content'); ?>
<div class="card p-4 shadow-sm" style="max-width: 450px; margin: 60px auto;">
    <div class="text-center mb-4">
        <h3 class="fw-bold" style="color: #2c3e50;">Inventory & Sales</h3>
        <p class="text-muted small">Silakan login untuk masuk ke sistem UTS</p>
    </div>

    <!-- Notifikasi jika Berhasil Logout atau ada pesan sukses -->
    <?php if(session('success')): ?>
        <div class="alert alert-success p-2 small mb-3" style="color: green;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- Form Login -->
    <form action="<?php echo e(route('login')); ?>" method="POST">
        <?php echo csrf_field(); ?> <!-- PROTEKSI KEAMANAN CSRF TOKEN WAJIB LARAVEL -->

        <!-- Input Email -->
        <div class="mb-3">
            <label class="form-label small fw-bold">Alamat Email</label>
            <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email')); ?>" placeholder="contoh: admin@gmail.com" required>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div style="color: red; font-size: 12px; margin-top: 5px;"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Input Password -->
        <div class="mb-3">
            <label class="form-label small fw-bold">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password Anda" required>
        </div>

        <!-- Tombol Login -->
         <div style="text-align: center; margin-top:20px;">
        <button type="submit" class="btn-primary w-100 border-0" style="padding: 12px; font-size: 15px; cursor: pointer; border-radius: 4px;">
            Masuk ke Sistem
        </button>
    </form>

    <div class="text-center mt-4 pt-2 border-top">
        <span class="text-muted small">Akun Demo UTS:</span><br>
        <span class="text-muted small">Admin: <b>admin@gmail.com</b> | password123</span><br>
        <span class="text-muted small">Staff: <b>staff@gmail.com</b> | password123</span>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\inventory-sales\resources\views/auth/login.blade.php ENDPATH**/ ?>