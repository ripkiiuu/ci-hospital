<?php include ('header.php') ?>

<body class="font-['Poppins'] bg-[#F5F5F5] h-screen">
    <?php include('d_navbar.php') ?>


    <div>
        <h1 class="text-3xl p-12 font-bold text-center text-[#005792]">Manage Visits</h1>
        <div class="w-[90%] border-2 border-[#005792] rounded-lg m-auto mb-12 p-4 bg-[#D1F4FA]">
            <a href="/doctor/visitsForm" class="flex my-4 w-[98%] border-2 border-[#005792] rounded-lg m-auto bg-[#EDF9FC] p-4">
                <img class="py-2 px-8" alt="icon" src="/img/new.png"/>
                <div class="ml-8 flex">
                    <h1 class="my-auto font-bold text-xl text-[#005792]">New Visit</h1>
                </div>
            </a>
            <?php foreach ($visits as $visit): ?>
                <div class="flex my-4 w-[98%] border-2 border-[#005792] rounded-lg m-auto bg-[#EDF9FC] p-4">
                    <img class="py-2 px-8" alt="icon" src="/img/visits.png"/>
                    <div class="ml-8">
                        <h1 class="font-bold text-xl text-[#005792]">Visit #<?php echo isset($visit['id']) ? $visit['id'] : null; ?></h1>
                        <p><?php echo isset($visit['tanggal']) ? $visit['tanggal'] : null; ?></p>
                        <p>Patient <?php echo isset($visit['id_pasien']) ? $visit['id_pasien'] : null; ?></p>
                        <p><?php echo isset($visit['nama_pasien']) ? $visit['nama_pasien'] : null; ?></p>
                        <p><?php echo isset($visit['keluhan']) ? $visit['keluhan'] : null; ?></p>
                        <p><?php echo isset($visit['diagnosa']) ? $visit['diagnosa'] : null; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <?php include('footer.php') ?>

</body>
</html>