<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pink Inventory | Inventory & Sales System</title>

    <style>
        * { box-sizing: border-box; }
        /* Styling khusus tombol di bawah kanan tabel */
.table-action-bottom {
    display: flex;
    justify-content: flex-end;
    margin-top: 15px;
}

.btn-pink-custom {
    background: #cf6595 !important;
    color: #ffffff !important;
    padding: 9px 14px !important;
    border-radius: 8px !important;
    font-size: 13px !important;
    font-weight: 650 !important;
    text-decoration: none !important;
    display: inline-block;
    transition: 0.2s;
}

.btn-pink-custom:hover {
    background: #b94e80 !important;
}

        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background: #fff5f9;
            color: #493541;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-size: 14px;
            display: flex;
        }

        /* SIDEBAR KIRI */
        .sidebar {
            width: 260px;
            background: #ffffff;
            border-right: 1px solid #f5d5e3;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            box-shadow: 3px 0 12px rgba(190, 90, 135, 0.05);
            z-index: 100;
            transition: transform 0.3s ease;
        }

        /* Saat sidebar disembunyikan */
        .sidebar.hidden {
            transform: translateX(-260px);
        }

        .brand {
            color: #bd4f83;
            font-size: 20px;
            font-weight: 800;
            text-decoration: none;
            padding: 24px 20px;
            border-bottom: 1px solid #f5d5e3;
            display: block;
            text-align: center;
        }

        .nav-links {
            display: flex;
            flex-direction: column;
            padding: 20px 15px;
            gap: 6px;
        }

        .nav-links a {
            color: #86536c;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            padding: 11px 14px;
            border-radius: 8px;
            transition: 0.2s;
        }

        .nav-links a:hover {
            background: #fce5ef;
            color: #bd4f83;
        }

        /* AREA KONTEN UTAMA DI KANAN (DEFAULT KETIKA SIDEBAR MUNCUL) */
        .main-content {
            margin-left: 260px;
            flex: 1;
            padding: 30px;
            min-width: 0;
            transition: all 0.3s ease;
        }

        /* KETIKA SIDEBAR DI-HIDE: KONTEN BERGESER TEPAT KE TENGAH LAYAR */
        .main-content.full {
            margin-left: 0;
            max-width: 950px;
            margin-left: auto;
            margin-right: auto;
        }

        /* TOMBOL TOGGLE SIDEBAR */
        .toggle-btn {
            background: #cf6595;
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 650;
            font-size: 13px;
            margin-bottom: 20px;
            transition: 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .toggle-btn:hover {
            background: #b94e80;
        }

        /* KARTU, FORM, TABEL DAN LAINNYA */
        .card {
            background: #ffffff;
            padding: 22px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(190, 90, 135, 0.08);
            border: 1px solid #f6dce7;
            width: 100%;
        }

        h1, h2, h3, h4, h5 { color: #a83f70; }
        h1 { font-size: 25px; }
        h2 { font-size: 22px; }
        
        .form-control, .form-select {
            width: 100%; min-height: 40px; padding: 9px 11px;
            border: 1px solid #e8cbd9; border-radius: 8px; background: #fffafd; color: #493541;
        }

        .btn { padding: 9px 13px; border-radius: 8px; cursor: pointer; font-weight: 650; text-decoration: none; border: none; }
        .btn-primary { background: #cf6595; color: white; }
        .btn-danger { background: #fff0f3; color: #bd4968; }

        table { width: 100%; border-collapse: collapse; background: #ffffff; font-size: 13px; }
        th { background: #fce8f1; color: #a83f70; padding: 10px; text-align: left; }
        td { padding: 10px; border-bottom: 1px solid #f3e3eb; }
    </style>
</head>

<body>

    <!-- SIDEBAR KIRI -->
    <div class="sidebar" id="sidebar">
        <a href="<?php echo e(url('/dashboard')); ?>" class="brand">
            ♡ Pink Inventory
        </a>

        <div class="nav-links">
            <a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a>
            <a href="<?php echo e(url('/products')); ?>">Produk</a>
            <a href="<?php echo e(route('categories.index')); ?>">Kategori</a>
            <a href="<?php echo e(route('suppliers.index')); ?>">Supplier</a>
            <a href="<?php echo e(url('/sales')); ?>">Riwayat Penjualan</a>
            <a href="<?php echo e(url('/sales/create')); ?>">Transaksi Baru</a>
        </div>
    </div>

    <!-- KONTEN UTAMA -->
    <div class="main-content" id="mainContent">
        <button class="toggle-btn" onclick="toggleSidebar()">
            ☰ Sembunyikan/Tampilkan Menu
        </button>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            
            sidebar.classList.toggle('hidden');
            mainContent.classList.toggle('full');
        }
    </script>

</body>
</html><?php /**PATH C:\xampp\htdocs\inventory-sales\resources\views/app.blade.php ENDPATH**/ ?>