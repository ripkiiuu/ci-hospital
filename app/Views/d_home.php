<?php include ('header.php') ?>

<body class="font-['Poppins'] bg-[#F5F5F5] min-h-screen">
    <?php include('d_navbar.php') ?>

    <div class="max-w-5xl mx-auto px-6 py-10">
        <h1 class="text-3xl font-bold text-center text-[#005792] mb-8">Daftar Obat Tersedia</h1>

        <?php if (empty($recommendObat)): ?>
            <p class="text-center text-gray-400 py-10">Belum ada data obat.</p>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php foreach ($recommendObat as $obat): ?>
                <div class="bg-white rounded-xl shadow p-6 border-l-4 border-[#005792] hover:shadow-md transition">
                    <h2 class="text-lg font-bold text-[#005792] mb-2"><?= esc($obat['nama']) ?></h2>
                    <p class="text-sm text-gray-600">Harga: <span class="font-semibold text-black">Rp <?= number_format($obat['harga'], 0, ',', '.') ?></span></p>
                    <p class="text-sm text-gray-600">Stok: <span class="font-semibold <?= $obat['stok'] > 0 ? 'text-green-600' : 'text-red-500' ?>"><?= $obat['stok'] ?> unit</span></p>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php include('footer.php') ?>
</body>
</html>