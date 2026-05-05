<?php include ('header.php') ?>

<body class="font-['Poppins'] bg-[#F5F5F5] h-screen">
    <?php include('d_navbar.php') ?>

    <div>
        <h1 class="text-3xl p-12 font-bold text-center text-[#005792]">Visit #<?php echo $kunjunganLastId + 1 ?></h1>
        <div class="w-[90%] border-2 border-[#005792] rounded-lg m-auto mb-12 p-8 bg-[#D1F4FA]">
            <form action="" method="post">
                <div class="grid grid-cols-2">
                    <div class="my-2">
                        <label for="date" class="block bg-white w-auto"></label>
                        <span class=" flex font-semibold text-neutral-700 text-sm ">Date</span>
                        <input name="tanggal" type="date" placeholder="Enter your username"
                            class="border-2 border-[#005792] px-4 flex w-[90%] text-xs text-start placeholder-gray-500 my-2 bg-neutral-100 py-2 rounded-md">
                    </div>
                    <div class="my-2">
                        <label for="time" class="block bg-white w-auto"></label>
                        <span class=" flex font-semibold text-neutral-700 text-sm ">Time</span>
                        <input name="waktu" type="time" placeholder="Enter your username"
                            class="border-2 border-[#005792] px-4 flex w-[90%] text-xs text-start placeholder-gray-500 my-2 bg-neutral-100 py-2 rounded-md">
                    </div>
                    <div class="my-2">
                        <label for="date" class="block bg-white w-auto"></label>
                        <span class=" flex font-semibold text-neutral-700 text-sm ">Patient ID</span>
                        <select name="id_pasien" id="patientDropdown" type="select" placeholder="Select ID..."
                            class="border-2 border-[#005792] px-4 flex w-[90%] text-xs text-start placeholder-gray-500 my-2 bg-neutral-100 py-2 rounded-md">
                            <option value="" data-name="">Select</option>
                            <?php foreach ($pasien as $p): ?>
                                <option value="<?= $p['id'] ?>" data-name="<?= $p['nama'] ?>" ><?= $p['id'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="my-2">
                        <label for="time" class="block bg-white w-auto"></label>
                        <span class=" flex font-semibold text-neutral-700 text-sm ">Doctor ID</span>
                        <select name="id_dokter" id="doctorDropdown" type="select" placeholder="Select ID..."
                            class="border-2 border-[#005792] px-4 flex w-[90%] text-xs text-start placeholder-gray-500 my-2 bg-neutral-100 py-2 rounded-md">
                            <option value="<?= $user['id'] ?>"><?= $user['id'] ?></option>
                        </select>
                    </div>
                    <div class="my-2">
                        <label for="date" class="block bg-white w-auto"></label>
                        <span class=" flex font-semibold text-neutral-700 text-sm ">Patient Name</span>
                        <p
                            id="selectedPatientName" class="border-2 border-[#005792] px-4 flex w-[90%] text-xs text-start my-2 bg-neutral-100 py-2 rounded-md h-9  ">
                            
                        </p>
                    </div>
                    <div class="my-2">
                        <label for="time" class="block bg-white w-auto"></label>
                        <span class=" flex font-semibold text-neutral-700 text-sm ">Doctor Name</span>
                        <p
                            id="selectedDoctorName" class="border-2 border-[#005792] px-4 flex w-[90%] text-xs text-start my-2 bg-neutral-100 py-2 rounded-md h-9">
                            <?= $user['nama'] ?>
                        </p>
                    </div>
                </div>
                <div class="my-4">
                    <label for="date" class="block bg-white w-auto"></label>
                    <span class=" flex font-semibold text-neutral-700 text-sm ">Complaint</span>
                    <input name="keluhan" type="text" placeholder="Explain the complaints"
                        class="border-2 border-[#005792] px-4 flex w-[95%] text-xs text-start my-2 bg-neutral-100 py-2 rounded-md">
                    </p>
                </div>
                <div class="my-4">
                    <label for="time" class="block bg-white w-auto"></label>
                    <span class=" flex font-semibold text-neutral-700 text-sm ">Diagnosis</span>
                    <input name="diagnosa" type="text" placeholder="Explain the diagnosis"
                        class="border-2 border-[#005792] px-4 flex w-[95%] text-xs text-start my-2 bg-neutral-100 py-2 rounded-md">
                    </p>
                </div>
                <div class="my-4">
                    <label for="time" class="block bg-white w-auto"></label>
                    <span class=" flex font-semibold text-neutral-700 text-sm ">Prescription</span>
                    <select name="preskripsi[]" placeholder="Select ID..."
                        class="border-2 border-[#005792] px-4 flex w-[90%] text-xs text-start placeholder-gray-500 my-2 bg-neutral-100 py-2 rounded-md" multiple>
                        <?php foreach ($obat as $o): ?>
                            <option value="<?= $o['id']?>" ><?php $o['jenis'] ?><?= $o['jenis'] ?> <?php $o['nama'] ?><?= $o['nama'] ?> [Sisa stok: <?php $o['jumlah_stok'] ?><?= $o['jumlah_stok'] ?>]</option>
                            <?php endforeach; ?>
                    </select>

                </div>
                <div class="text-center mt-8">
                    <button type="submit"
                        class="flex m-auto items-center bg-[#005792] hover:bg-[#003772] py-2 px-12 rounded-lg font-bold text-white text-center w-fit">Save</button>
                </div>
            </form>
        </div>
    </div>


    <?php include('footer.php') ?>
</body>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#patientDropdown').change(function() {
            var selectedName = $('#patientDropdown option:selected').data('name');
            $('#selectedPatientName').text(selectedName);
        });
    });
</script>

</html>