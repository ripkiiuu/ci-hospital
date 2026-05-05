<?php include ('header.php') ?>
<body class="font-['Poppins'] bg-[#F5F5F5] h-screen">
<header class="bg-[#F5F5F5]">
    <?php include('apoteker_navbar.php') ?>
    
    <div class="container mx-auto px-12 mt-12 mb-48">
        <h1 class="font-bold text-3xl mb-8 text-[#005792]">Daftar Resep Masuk</h1>
        
        <div class="bg-white rounded-lg shadow p-6">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="p-4 rounded-tl-lg">ID Kunjungan</th>
                        <th class="p-4">Tanggal Kunjungan</th>
                        <th class="p-4">Nama Pasien</th>
                        <th class="p-4 rounded-tr-lg">Daftar Obat (Resep)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($reseps)): ?>
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500">Belum ada resep masuk.</td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($reseps as $r): ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-4 font-bold">#<?= $r['id'] ?></td>
                        <td class="p-4"><?= date('d M Y, H:i', strtotime($r['tanggal'])) ?></td>
                        <td class="p-4 font-semibold text-blue-800"><?= $r['nama_pasien'] ?></td>
                        <td class="p-4">
                            <?php if ($r['daftar_obat']): ?>
                                <?= $r['daftar_obat'] ?>
                            <?php else: ?>
                                <span class="text-gray-400 italic">Tidak ada obat</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include('footer.php') ?>
</body>
</html>
