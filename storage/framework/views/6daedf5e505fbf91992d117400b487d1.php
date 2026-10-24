

<?php $__env->startSection('content'); ?>
<div class="card p-4 shadow-sm" style="max-width: 600px; margin: 30px auto;">
    <div style="border-bottom: 2px solid #ecf0f1; padding-bottom: 15px; margin-bottom: 20px;">
        <h2 class="fw-bold" style="color: #2c3e50; margin: 0;">Tambah Produk Baru</h2>
        <small class="text-muted">Masukkan informasi produk baru secara lengkap dan valid</small>
    </div>
    
    <!-- Form Input Produk -->
    <form action="<?php echo e(route('products.store')); ?>" method="POST">
        <?php echo csrf_field(); ?> <!-- PROTEKSI KEAMANAN CSRF TOKEN WAJIB LARAVEL -->

        <!-- Input Kategori (Dropdown Relasi) -->
        <div class="mb-3">
            <label class="form-label fw-bold small">Pilih Kategori Produk</label>
            <select name="category_id" class="form-control" style="background-color: white;" required>
                <option value="">-- Pilih Kategori --</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat->id); ?>" <?php echo e(old('category_id') == $cat->id ? 'selected' : ''); ?>><?php echo e($cat->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: red; font-size: 12px; margin-top: 5px;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Input SKU (Harus Unik) -->
        <div class="mb-3">
            <label class="form-label fw-bold small">Kode SKU (Harus Unik)</label>
            <input type="text" name="sku" class="form-control" placeholder="Contoh: ELK-HP-03" value="<?php echo e(old('sku')); ?>" required>
            <?php $__errorArgs = ['sku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: red; font-size: 12px; margin-top: 5px;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Input Nama Produk -->
        <div class="mb-3">
            <label class="form-label fw-bold small">Nama Produk</label>
            <input type="text" name="name" class="form-control" placeholder="Masukkan nama produk" value="<?php echo e(old('name')); ?>" required>
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: red; font-size: 12px; margin-top: 5px;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Input Harga Beli (Tidak Boleh Negatif) -->
        <div class="mb-3">
            <label class="form-label fw-bold small">Harga Beli (Rp)</label>
            <input type="number" name="purchase_price" class="form-control" placeholder="Contoh: 50000" value="<?php echo e(old('purchase_price')); ?>" min="0" required>
            <?php $__errorArgs = ['purchase_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: red; font-size: 12px; margin-top: 5px;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Input Harga Jual (Tidak Boleh Negatif) -->
        <div class="mb-3">
            <label class="form-label fw-bold small">Harga Jual (Rp)</label>
            <input type="number" name="selling_price" class="form-control" placeholder="Contoh: 75000" value="<?php echo e(old('selling_price')); ?>" min="0" required>
            <?php $__errorArgs = ['selling_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: red; font-size: 12px; margin-top: 5px;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Input Stok Awal (Tidak Boleh Negatif) -->
        <div class="mb-3">
            <label class="form-label fw-bold small">Jumlah Stok Awal</label>
            <input type="number" name="stock" class="form-control" placeholder="Contoh: 10" value="<?php echo e(old('stock')); ?>" min="0" required>
            <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: red; font-size: 12px; margin-top: 5px;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Input Batas Stok Minimum (Tidak Boleh Negatif) -->
        <div class="mb-3">
            <label class="form-label fw-bold small">Batas Stok Minimum Peringatan</label>
            <input type="number" name="minimum_stock" class="form-control" placeholder="Contoh: 2" value="<?php echo e(old('minimum_stock')); ?>" min="0" required>
            <?php $__errorArgs = ['minimum_stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: red; font-size: 12px; margin-top: 5px;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Tombol Aksi -->
        <div style="display: flex; justify-content: space-between; margin-top: 25px; border-top: 1px solid #ecf0f1; padding-top: 15px;">
            <a href="<?php echo e(route('products.index')); ?>" style="background-color: #7f8c8d; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-weight: bold; font-size: 14px;">
                ❌ Batal
            </a>
            <button type="submit" class="btn-primary" style="width: auto; padding: 10px 25px; font-size: 14px;">
                💾 Simpan Produk
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\inventory-sales\resources\views/products/create.blade.php ENDPATH**/ ?>