<?php include ('header.php') ?>

<body class="font-['Poppins'] bg-[#F5F5F5] h-screen">
    <header class="bg-[#F5F5F5]">
    <?php include('a_navbar.php') ?>


    <div>
        <h1 class="text-3xl pt-12  font-bold text-center text-[#005792]">Manage Patients</h1>
        <div class="w-[90%] m-auto mb-12 p-8 pt-0">
            <div class="justify-end flex mb-12">
                <button id="addButton" class="m-4 flex border-2 align-middle border-[#005792] text-[#005792] px-8 py-2 rounded-lg align-items-center">
                    <img class="px-2 align-middle w-12" alt="addpatients" src="/img/add_patient.png" />
                    <div class="flex items-center">
                    <p class="font-bold align-middle">Add Patient</p>
                    </div>
                </button>
            </div>
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
                    <?php 
                        foreach ($patients as $patient):
                            echo '
                            <tr class="h-12">
                                <td>' . (isset($patient['id']) ? $patient['id'] : null) . '</td>
                                <td>' . (isset($patient['nama']) ? $patient['nama'] : null) . '</td>
                                <td>' . (isset($patient['tanggal_lahir']) ? $patient['tanggal_lahir'] : null) . '</td>
                                <td>' . (isset($patient['alamat']) ? $patient['alamat'] : null) . '</td>
                                <td>
                                    <button id="editButton' . ( isset($patient["id"]) ? ($patient["id"])  : null ) . '" data-id="' . ( isset($patient["id"]) ? ($patient["id"])  : null ) . '">
                                        <img class="w-14 p-2" alt="edit" src="/img/edit.png" />
                                    </button>
                                    <button id="deleteButton' . ( isset($patient["id"]) ? ($patient["id"])  : null ) . '" data-id="'. ( isset($patient["id"]) ? ($patient["id"])  : null ) . '">
                                        <img class="w-14 p-2" alt="delete" src="/img/delete.png" />
                                    </button>
                                </td>
                            </tr>
                        ';
                        endforeach;
                        echo '
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>';

                        include('editpasien.php');
                        include('popupdelete.php');
                    
                        include('footer.php');

                        echo '
                            </body>

                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    var editModal = document.getElementById("editModal");

                                    document.getElementById("addButton").addEventListener("click", function (event) {
                                        event.preventDefault();
                                        editModal.removeAttribute("style");
                                        editModal.setAttribute("httpmethod", "POST");
                                    });
                            ';

                        foreach ($patients as $patient):
                            $patientId = isset($patient["id"]) ? $patient["id"] : null;
                            $nama_pasien = isset($patient["nama"]) ? $patient["nama"] : null;
                            $tanggal_lahir = isset($patient["tanggal_lahir"]) ? $patient["tanggal_lahir"] : null;
                            $alamat = isset($patient["alamat"]) ? $patient["alamat"] : null;
                            echo '
                                document.getElementById("editButton' . $patientId . '").addEventListener("click", function (event) {
                                    event.preventDefault();
                                    editModal.removeAttribute("style");
                                    editModal.setAttribute("data-id", "' . $patientId . '");
                                    editModal.setAttribute("httpmethod", "PUT");

                                    editModal.setAttribute("nama-pasien", "' . $nama_pasien . '");
                                    editModal.setAttribute("tanggal-lahir", "' . $tanggal_lahir . '");
                                    editModal.setAttribute("alamat", "' . $alamat . '");

                                    document.getElementsByName("namapasien")[0].value = editModal.getAttribute("nama-pasien");
                                    document.getElementsByName("tanggallahir")[0].value = editModal.getAttribute("tanggal-lahir");
                                    document.getElementsByName("alamat")[0].value = editModal.getAttribute("alamat");
                                });
                            ';
                        endforeach;

                        echo '
                                var deleteConfirmation = document.getElementById("deleteConfirmation");
                            ';

                        foreach ($patients as $patient):
                            $patientId = isset($patient["id"]) ? $patient["id"] : null;
                            echo '
                                document.getElementById("deleteButton' . $patientId . '").addEventListener("click", function (event) {
                                    event.preventDefault();
                                    deleteConfirmation.removeAttribute("style");
                                    document.getElementById("delete").setAttribute("data-id", "' . $patientId . '");
                                });
                            ';
                        endforeach;

                        echo '
                            });
                            </script>
                        ';
                    ?>