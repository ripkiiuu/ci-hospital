<?php include ('header.php') ?>

<body class="font-['Poppins'] bg-[#F5F5F5] min-h-screen">
    <?php include('pasien_navbar.php') ?>

    <div class="max-w-4xl mx-auto px-6 py-10">

        <!-- Welcome Card -->
        <div class="bg-gradient-to-r from-[#005792] to-[#0077b6] rounded-2xl p-8 text-white mb-8 shadow-lg">
            <h1 class="text-3xl font-bold mb-1">Selamat Datang, <?= esc($pasien['nama']) ?>!</h1>
            <p class="text-blue-100 text-sm">Tanggal Lahir: <?= esc($pasien['tanggal_lahir']) ?> &nbsp;|&nbsp; Alamat: <?= esc($pasien['alamat']) ?></p>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-2 gap-6 mb-10">
            <div class="bg-white rounded-xl p-6 shadow border-l-4 border-[#005792]">
                <p class="text-sm text-gray-500">Total Kunjungan</p>
                <p class="text-4xl font-bold text-[#005792]"><?= count($kunjungans) ?></p>
            </div>
            <div class="bg-white rounded-xl p-6 shadow border-l-4 border-green-500">
                <p class="text-sm text-gray-500">Status Akun</p>
                <p class="text-2xl font-bold text-green-600">Aktif</p>
            </div>
        </div>

        <!-- Riwayat Kunjungan -->
        <div class="bg-white rounded-2xl shadow p-6">
            <h2 class="text-xl font-bold text-[#005792] mb-4">Riwayat Kunjungan</h2>

            <?php if (empty($kunjungans)): ?>
                <p class="text-gray-400 text-center py-8">Belum ada riwayat kunjungan.</p>
            <?php else: ?>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-[#EDF9FC] text-[#005792]">
                                <th class="text-left p-3 rounded-tl-lg">Tanggal</th>
                                <th class="text-left p-3">Keluhan</th>
                                <th class="text-left p-3">Diagnosa</th>
                                <th class="text-left p-3 rounded-tr-lg">Preskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kunjungans as $k): ?>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3"><?= esc($k['tanggal']) ?></td>
                                <td class="p-3"><?= esc($k['keluhan']) ?></td>
                                <td class="p-3"><?= esc($k['diagnosa']) ?></td>
                                <td class="p-3">
                                    <?php
                                        $preskripsi = json_decode($k['preskripsi'], true);
                                        echo is_array($preskripsi) ? count($preskripsi) . ' obat' : '-';
                                    ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php include('footer.php') ?>
</body>
</html>
