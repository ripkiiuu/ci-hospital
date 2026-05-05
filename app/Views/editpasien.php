<div id="editModal" class="justify-center items-center flex overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none bg-neutral-800/70" style="display: none;">
    <div class="bg-white h-80 w-[330px] rounded-2xl shadow-2xl">
        <div class="flex justify-end">
            <button id="closeButton">
                <img src="/img/close.png" alt="/img/close.png" class="mr-4 h-6 w-6 mt-3">
            </button>
        </div>
        <h1 class="text-[#005792] text-lg font-bold font-poppins text-center">Input Patient Data</h1>

        <form action="" method="post">
            <div class="flex">
                <div>
                    <label for="name" class=""></label>
                        <input type="text" name="namapasien" placeholder="Nama Pasien" class="mt-6 ml-8 border-2 border-gray-400 flex w-64 px-4 text-xs justify text-start placeholder-gray-500 my-4 bg-neutral-100 py-2 rounded-xl font-poppins">
                    <label for="price" class=""></label>
                        <input type="date" name="tanggallahir" placeholder="Tanggal Lahir" class="-mt-1 ml-8 border-2 border-gray-400 flex w-64 px-4 text-xs justify text-start placeholder-gray-500 my-4 bg-neutral-100 py-2 rounded-xl font-poppins">
                    <label for="stok" class=""></label>
                        <input type="text" name="alamat" placeholder="Alamat" class="-mt-1 ml-8 border-2 border-gray-400 flex w-64 px-4 text-xs justify text-start placeholder-gray-500 my-4 bg-neutral-100 py-2 rounded-xl font-poppins">
                </div>
            </div>
            <div class="text-center">
                <button id="save" type="submit" class="text-center m-auto mt-2 h-8 w-58 bg-[#005792] hover:bg-[#224b66] text-white text-sm font-medium font-poppins rounded-lg py-1 px-8">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var editModal = document.getElementById("editModal");

        document.getElementById("closeButton").addEventListener("click", function (event) {
            event.preventDefault();
            editModal.setAttribute("style", "display: none;");
        });

        document.getElementById("save").addEventListener("click", function (event) {
            event.preventDefault();
            var id = editModal.getAttribute("data-id") ?? null;
            var httpmethod = editModal.getAttribute("httpmethod");
            
            if (httpmethod == "PUT") {
                editPasien(id);
            }
            else if (httpmethod == "POST") {
                addPasien();
            }
        })

        function editPasien(id) {
            fetch("/api/pasien/" + id, {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    "nama": document.getElementsByName("namapasien")[0].value,
                    "tanggal_lahir": document.getElementsByName("tanggallahir")[0].value,
                    "alamat": document.getElementsByName("alamat")[0].value 
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                setTimeout(function () {
                    window.location.reload();
                }, 500);
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        }

        function addPasien() {
            fetch("/api/pasien", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    "nama": document.getElementsByName("namapasien")[0].value,
                    "tanggal_lahir": document.getElementsByName("tanggallahir")[0].value,
                    "alamat": document.getElementsByName("alamat")[0].value 
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                setTimeout(function () {
                    window.location.reload();
                }, 500);
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        }
    });
</script>