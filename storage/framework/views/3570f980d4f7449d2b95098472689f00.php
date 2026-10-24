

<?php $__env->startSection('content'); ?>

<style>
    .sales-page {
        max-width: 1000px;
        margin: 25px auto;
        padding: 10px;
        color: #493541;
    }

    .sales-card {
        background: #fff;
        border: 1px solid #f7dce8;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 8px 28px rgba(190, 110, 145, 0.10);
    }

    .sales-header {
        padding: 28px 30px;
        background: linear-gradient(135deg, #fff0f6, #fce1ed);
        border-bottom: 1px solid #f5d4e2;
    }

    .sales-header h2 {
        margin: 0 0 8px;
        color: #a83f70;
        font-size: 25px;
        font-weight: 750;
    }

    .sales-header p {
        margin: 0;
        color: #886878;
        font-size: 14px;
        line-height: 1.7;
    }

    .sales-body {
        padding: 28px 30px;
    }

    .product-box {
        background: #fff9fc;
        border: 1px solid #f2d5e2;
        border-radius: 17px;
        padding: 22px;
    }

    .product-heading {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 18px;
        color: #a83f70;
        font-size: 17px;
        font-weight: 700;
    }

    .product-heading span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        background: #fce2ed;
        border-radius: 11px;
    }

    .item-row {
        padding: 16px 12px;
        margin-bottom: 12px !important;
        background: #fff;
        border: 1px solid #f3dce6;
        border-radius: 13px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: #69485a;
        font-size: 13px;
        font-weight: 700;
    }

    .form-control,
    .form-select {
        min-height: 44px;
        border: 1px solid #e8cbd9;
        border-radius: 10px;
        background-color: #fff;
        color: #493541;
        font-size: 14px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #dc82ad;
        box-shadow: 0 0 0 3px rgba(220, 130, 173, 0.15);
    }

    .btn-pink {
        background: #cf6595;
        border: 1px solid #cf6595;
        color: #fff;
        border-radius: 10px;
        font-weight: 650;
        padding: 11px 20px;
        transition: 0.2s;
    }

    .btn-pink:hover {
        background: #b94e80;
        border-color: #b94e80;
        color: #fff;
    }

    .btn-add-pink {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-top: 6px;
        padding: 10px 15px;
        color: #b94e80;
        background: #fff;
        border: 1px dashed #d98caf;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 650;
    }

    .btn-add-pink:hover {
        background: #fceaf2;
        color: #a83f70;
    }

    .btn-remove-item {
        min-height: 42px;
        border: 1px solid #f1c5d4;
        background: #fff0f4;
        color: #c44d72;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 650;
    }

    .btn-remove-item:hover:not(:disabled) {
        background: #f8dce6;
        color: #a83259;
    }

    .btn-remove-item:disabled {
        opacity: 0.45;
    }

    .sales-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 25px;
        padding-top: 22px;
        border-top: 1px solid #f3e2e9;
    }

    .btn-back-pink {
        display: inline-block;
        padding: 11px 17px;
        color: #91677b;
        background: #fff4f8;
        border: 1px solid #f0d7e2;
        border-radius: 10px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 650;
    }

    .btn-back-pink:hover {
        background: #fce5ef;
        color: #a83f70;
    }

    .sales-alert {
        padding: 13px 16px;
        margin-bottom: 20px;
        border: 1px solid #f1c6d3;
        border-radius: 11px;
        background: #fff0f3;
        color: #a83259;
        font-size: 14px;
    }

    @media (max-width: 576px) {
        .sales-page {
            margin: 10px auto;
            padding: 5px;
        }

        .sales-header,
        .sales-body {
            padding: 20px 16px;
        }

        .product-box {
            padding: 14px;
        }

        .item-row {
            padding: 14px 10px;
        }

        .sales-header h2 {
            font-size: 21px;
        }

        .sales-footer > * {
            width: 100%;
            text-align: center;
        }
    }
</style>

<div class="sales-page">
    <div class="sales-card">

        <div class="sales-header">
            <h2>♡ Transaksi Penjualan Baru</h2>
            <p>
                Catat transaksi penjualan dan pengeluaran stok
                barang dengan mudah dan teratur.
            </p>
        </div>

        <div class="sales-body">

            <?php if(session('error')): ?>
                <div class="sales-alert">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="sales-alert">
                    <strong>Periksa kembali data kamu:</strong>
                    <ul class="mb-0 mt-2">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('sales.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="product-box">
                    <div class="product-heading">
                        <span>🛍️</span>
                        <div>
                            Daftar Item Produk
                            <div style="font-size:12px;font-weight:400;color:#98778a;margin-top:3px;">
                                Pilih produk dan masukkan jumlah barang.
                            </div>
                        </div>
                    </div>

                    <div id="transaction-items">
                        <div class="row g-3 item-row align-items-end">
                            <div class="col-md-7">
                                <label class="form-label">
                                    Pilih Produk
                                </label>

                                <select
                                    name="items[0][product_id]"
                                    class="form-select"
                                    required
                                >
                                    <option value="">
                                        -- Pilih Barang di Gudang --
                                    </option>

                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($prod->id); ?>">
                                            <?php echo e($prod->sku); ?> - <?php echo e($prod->name); ?>

                                            (Stok: <?php echo e($prod->stock); ?>)
                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">
                                    Jumlah (Qty)
                                </label>

                                <input
                                    type="number"
                                    name="items[0][quantity]"
                                    class="form-control"
                                    min="1"
                                    placeholder="Masukkan jumlah"
                                    required
                                >
                            </div>

                            <div class="col-md-2">
                                <label class="form-label d-md-block d-none">
                                    Aksi
                                </label>

                                <button
                                    type="button"
                                    class="btn btn-remove-item w-100"
                                    disabled
                                >
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </div>

                    <button
                        type="button"
                        class="btn btn-add-pink"
                        id="btn-add-item"
                    >
                        <span style="font-size:17px;">+</span>
                        Tambah Item Barang
                    </button>
                </div>

                <div class="sales-footer">
                    <a
                        href="<?php echo e(route('sales.index')); ?>"
                        class="btn-back-pink"
                    >
                        ← Kembali ke Riwayat
                    </a>

                    <button type="submit" class="btn btn-pink">
                        ♡ Simpan Transaksi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let itemIndex = 1;

    const container = document.getElementById('transaction-items');
    const btnAddItem = document.getElementById('btn-add-item');

    btnAddItem.addEventListener('click', function () {
        const newRow = document.createElement('div');

        newRow.className = 'row g-3 item-row align-items-end';

        newRow.innerHTML = `
            <div class="col-md-7">
                <label class="form-label">Pilih Produk</label>

                <select
                    name="items[${itemIndex}][product_id]"
                    class="form-select"
                    required
                >
                    <option value="">-- Pilih Barang di Gudang --</option>

                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($prod->id); ?>">
                            <?php echo e($prod->sku); ?> - <?php echo e($prod->name); ?> (Stok: <?php echo e($prod->stock); ?>)
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Jumlah (Qty)</label>

                <input
                    type="number"
                    name="items[${itemIndex}][quantity]"
                    class="form-control"
                    min="1"
                    placeholder="Masukkan jumlah"
                    required
                >
            </div>

            <div class="col-md-2">
                <label class="form-label d-md-block d-none">Aksi</label>

                <button
                    type="button"
                    class="btn btn-remove-item w-100"
                >
                    Hapus
                </button>
            </div>
        `;

        container.appendChild(newRow);
        itemIndex++;
        updateRemoveButtons();
    });

    container.addEventListener('click', function (event) {
        const removeButton = event.target.closest('.btn-remove-item');

        if (removeButton && !removeButton.disabled) {
            removeButton.closest('.item-row').remove();
            updateRemoveButtons();
        }
    });

    function updateRemoveButtons() {
        const rows = container.querySelectorAll('.item-row');

        rows.forEach(function (row) {
            const button = row.querySelector('.btn-remove-item');
            button.disabled = rows.length === 1;
        });
    }
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\inventory-sales\resources\views/sales/create.blade.php ENDPATH**/ ?>