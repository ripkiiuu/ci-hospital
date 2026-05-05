<?php include ('header.php') ?>

<body class="font-['Poppins'] bg-[#F5F5F5] h-screen">
    <?php include('a_navbar.php') ?>
    <div>
        <h1 class="text-3xl p-12 font-bold text-center text-[#005792]">Manage Patients</h1>
        <div class="m-auto mb-12 p-8 ">
            <table class="w-full text-center">
                <thead class="text-[#005792] font-bold text-xl border-b-4 border-[#005792]">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Address</th>
                    <th>Manage</th>
                </thead>
                <!-- <div class="bg-[#005792] h-2 w-full"><br/></div> -->
                <tbody>
                    <tr class="h-12">
                        <td>
                            <input type="number" placeholder="##" class="border-2 border-[#005792] px-4 flex m-auto text-xs text-start placeholder-gray-500 my-2 bg-neutral-100 py-2 rounded-md">
                        </td>
                        <td>
                            <input type="text" placeholder="Patient Name" class="border-2 border-[#005792] px-4 flex m-auto text-xs text-start placeholder-gray-500 my-2 bg-neutral-100 py-2 rounded-md">
                        </td>
                        <td>
                            <input type="date" placeholder="" class="border-2 border-[#005792] px-4 flex m-auto text-xs text-start placeholder-gray-500 my-2 bg-neutral-100 py-2 rounded-md">
                        </td>
                        <td>
                            <input type="text" placeholder="Patient Address" class="border-2 border-[#005792] px-4 flex m-auto text-xs text-start placeholder-gray-500 my-2 bg-neutral-100 py-2 rounded-md">
                        </td>
                        <td>
                            <button>
                                <div class="w-28 p-2 bg-[#005792] rounded-md text-white">Save</div>
                            </button>
                        </td>
                    </tr>
                    <?php foreach ($patients as $patient): ?>
                        <tr class="h-12">
                            <td><?php echo isset(patient['id']) ? patient['id'] : null; ?></td>
                            <td><?php echo isset(patient['nama']) ? patient['nama'] : null; ?></td>
                            <td><?php echo isset(patient['nama']) ? patient['nama'] : null; ?></td>
                            <td><?php echo isset(patient['nama']) ? patient['nama'] : null; ?></td>
                            <td>
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