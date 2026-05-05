<?php include ('header.php') ?>

<body class="font-['Poppins'] bg-[#F5F5F5] h-screen">
    <?php include('a_navbar.php') ?>

    <div>
        <h1 class="text-3xl p-12 font-bold text-center text-[#005792]">Manage Transactions</h1>
        <div class="w-[90%] m-auto mb-12 p-8 ">
            <table class="w-full text-center gap-y-12">
                <thead class="text-[#005792] font-bold text-xl border-b-4 border-[#005792]">
                    <th class="py-4">ID</th>
                    <th class="py-4">Visit Price</th>
                    <th class="py-4">Medicine Price</th>
                    <th class="py-4">Total Price</th>
                    <th class="py-4">Visit Paid</th>
                    <th class="py-4">Medicine Paid</th>
                </thead>
                <!-- <div class="bg-[#005792] h-2 w-full"><br/></div> -->
                <tbody>
                    <?php foreach ($transactions as $transaction): ?>
                        <tr id="<?php echo isset($transaction['id']) ? $transaction['id'] : null; ?>" class="h-12">
                            <td><?php echo isset($transaction['id']) ? $transaction['id'] : null; ?></td>
                            <td><?php echo isset($transaction['biaya_rs']) ? $transaction['biaya_rs'] : null; ?></td>
                            <td><?php echo isset($transaction['biaya_apotek']) ? $transaction['biaya_apotek'] : null; ?></td>
                            <td><?php echo isset($transaction['biaya_rs']) && isset($transaction['biaya_apotek']) ? $transaction['biaya_rs'] + $transaction['biaya_apotek'] : null; ?></td>
                            <form>
                                <td class="py-4">
                                    <input type="checkbox" id="visit" name="visit" value="visit" class="appearance-npne w-4 h-4 bg-[#005792] rounded-md"
                                    <?php echo isset ($transaction['status_rs']) ? ($transaction['status_rs'] ? 'checked' : '' ) : ''; ?> />
                                </td>
                                <td class="py-4">
                                    <input type="checkbox" id="full" name="full" value="full" class="appearance-npne w-4 h-4 bg-[#005792] rounded-md" 
                                    <?php echo isset ($transaction['status_apotek']) ? ($transaction['status_apotek'] ? 'checked' : '' ) : ''; ?> />
                                </td>
                            </form>
                        </tr>
                    <?php endforeach; ?>                    
                </tbody>
            </table>
            <div class="text-center mt-8">
            <button id="saveButton" class="flex m-auto items-center bg-[#005792] py-2 px-12 rounded-lg font-bold text-white text-center w-fit">SAVE</button>
        </div>
        </div>
    </div>


    <?php include('footer.php') ?>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("saveButton").addEventListener("click", function (event) {
            event.preventDefault();
            updateTransactions();
        });

        function updateTransactions() {
            var checkboxes = document.querySelectorAll('#visit, #full');
            var transactionsUpdated = [];

            checkboxes.forEach(function (checkbox) {
                var transactionId = checkbox.closest("tr").id;
                var existingTransaction = transactionsUpdated.find(t => t.id === transactionId);
                if (existingTransaction) {
                    existingTransaction.status_rs = checkbox.name === "visit" ? existingTransaction.status_rs === null ? checkbox.checked : null : existingTransaction.status_rs;
                    existingTransaction.status_apotek = checkbox.name === "full" ? existingTransaction.status_apotek === null ? checkbox.checked : null : existingTransaction.status_apotek;
                }
                else {
                    transactionsUpdated.push({
                        id: transactionId,
                        status_rs: checkbox.name === "visit" ? checkbox.checked : null,
                        status_apotek: checkbox.name === "full" ? checkbox.checked : null,
                    });
                }
            })

            console.log(transactionsUpdated);

            transactionsUpdated.forEach(function (transaction) {
                fetch("/api/transaksi/" + transaction.id, {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        "status_rs": transaction.status_rs,
                        "status_apotek": transaction.status_apotek
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    setTimeout(function() {
                        window.location.reload();
                    }, 500);
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
            })
        }
    });
</script>

