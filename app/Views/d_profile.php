<?php include ('header.php') ?>

<body class="font-['Poppins'] bg-[#F5F5F5] h-screen">
    <?php include('d_navbar.php') ?>

    <div class="mb-36">
        <h1 class="text-3xl p-12 font-bold text-center text-[#005792]">Profile</h1>
        <div class="w-[50%] m-auto mb-12 flex text-xl">
            <div class="pt-12">
                <img class="w-36 h-36" alt="admin" src="/img/admin.png" />
            </div>
            <div class="h-60 w-2 bg-[#005792] mx-16"><br/></div>
            <div class="items-center flex">
                <div>
                    <h1 class="font-bold p-4 text-[#005792]">Role: Dokter</h1>
                    <p class="p-4">Nama: <?php echo isset($dokter['nama']) ? $dokter['nama'] : null; ?></p>
                    <p class="p-4">ID: <?php echo isset($dokter['id']) ? $dokter['id'] : null; ?></p>
                </div>
            </div>
        </div>
        <div class="text-center mt-8">
            <button class="flex m-auto items-center bg-[#005792] py-2 px-12 rounded-lg font-bold text-white text-center w-fit">LOG OUT</button>
        </div>
    </div>

    <?php include('footer.php') ?>

</body>

</html>