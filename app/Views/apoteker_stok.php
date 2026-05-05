<?php include ('header.php') ?>
<body class="font-['Poppins'] bg-[#F5F5F5] h-screen">
<header class="bg-[#F5F5F5]">
    <?php include('apoteker_navbar.php') ?>
    
    <div class="container mx-auto px-12 mt-12 mb-48">
        <h1 class="font-bold text-3xl mb-8 text-[#005792]">Manajemen Stok Obat</h1>
        
        <div class="bg-white rounded-lg shadow p-6">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="p-4 rounded-tl-lg">ID</th>
                        <th class="p-4">Nama Obat</th>
                        <th class="p-4">Harga</th>
                        <th class="p-4 rounded-tr-lg">Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($obats as $o): ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-4"><?= $o['id'] ?></td>
                        <td class="p-4 font-semibold"><?= $o['nama'] ?></td>
                        <td class="p-4">Rp <?= number_format($o['harga'], 0, ',', '.') ?></td>
                        <td class="p-4">
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full font-bold">
                                <?= $o['stok'] ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include('footer.php') ?>
</body>
</html>
