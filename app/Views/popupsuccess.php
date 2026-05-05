<div id="success" class="justify-center items-center flex overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none bg-neutral-800/70" style="display: none;">
    <div class="bg-white h-48 w-[400px] rounded-2xl shadow-2xl">
        <h1 class="text-green-800 text-xl font-bold font-poppins text-center mt-5">Send Recapitulation Success</h1>
        <div class="items-center justify-center m-auto">
            <img src="/popup/success.png" alt="success" class=" content-center mr-4 h-24 mt-8 mb-10 w-24 items-center m-36">
        </div>
    </div>
</div>

<script>
    function checkModalVisibility() {
        var successModal = document.getElementById("success");
            
        if (successModal.style.display !== 'none') {
            //Reload the page
            setTimeout(function () {
                window.location.reload();
            }, 1000);
        }
    }

    setInterval(checkModalVisibility, 1500);
</script>