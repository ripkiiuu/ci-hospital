<?php include ('header.php') ?>

<body class="font-['Poppins'] bg-[#F5F5F5] h-screen">
    <?php include('a_navbar.php') ?>

    <div class="flex text-center justify-center items-center mt-24">
        <div class=" mx-auto bg-[#005792] h-[300px] w-[640px] rounded-2xl shadow-2xl mb-24">
            <div class="">
                <h1 class="font-poppins font-bold text-2xl text-white mt-10">Recapitulations</h1>
                <h1 class="font-poppins font-normal text-sm text-white mt-5">Please select the month you want to recapitulate</h1>

            </div>

            <div class="justify-center mt-5">
                <select name="dropdown" id="transactionDropdown" type="select" placeholder="Select Month..." class="w-64 border-2 border-[#D1F4FA] px-4 text-xs placeholder-gray-500 my-2 bg-neutral-100 py-2 rounded-lg">
                    <option value="" data-name="">Select</option>
                    <option value=1 data-name="">January</option>
                    <option value=2 data-name="">February</option>
                    <option value=3 data-name="">March</option>
                    <option value=4 data-name="">April</option>
                    <option value=5 data-name="">May</option>
                    <option value=6 data-name="">June</option>
                    <option value=7 data-name="">July</option>
                    <option value=8 data-name="">August</option>
                    <option value=9 data-name="">September</option>
                    <option value=10 data-name="">October</option>
                    <option value=11 data-name="">November</option>
                    <option value=12 data-name="">December</option>
                </select>
            </div>
            <div class="text-center">
                <button id="saveButton" type="submit" class="w-64 text-center m-auto mt-2 h-8 bg-[#D1F4FA] hover:bg-[#b5daf2] text-black text-sm font-medium font-poppins rounded-lg py-1 px-8">Send Recapitulations</button>
            </div>
        </div>
    </div>
    
    <?php include('popupsuccess.php') ?>
    <?php include('footer.php') ?>
</body>

<script>
    document.getElementById("saveButton").addEventListener("click", function (event) {
        event.preventDefault();
        var dropdown = document.getElementById("transactionDropdown");
        var month = dropdown.value;
        sendRecap(month);

        var success = document.getElementById("success");
        setTimeout(function () {
            success.removeAttribute("style");
        }, 1500);
    });

    function sendRecap(month) {

        var res = fetch("/api/recapTransaksi/" + month, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            fetch("http://localhost:8080/api/transaksi", {
                method: "POST",
                mode: "no-cors",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    "bulan": month,
                    "total_biaya": data.data
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
            })
            .catch((error) => {
                console.error("Error:", error);
            })
        })
        .catch((error) => {
            console.error("Error:", error);
        });
    }

</script>
