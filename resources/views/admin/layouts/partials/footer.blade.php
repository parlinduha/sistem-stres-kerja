<div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span id="copyright" class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
        <span id="currentYear"></span>.
        <a href="https://github.com/parlinduha/" target="_blank">Dev </a> . All rights
        reserved.</span>
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Version 1.0 <i
            class="ti-heart text-danger ml-1"></i></span>
</div>

<script>
    // Mendapatkan elemen tahun
    var currentYearElement = document.getElementById('currentYear');

    // Mendapatkan tahun saat ini
    var currentYear = new Date().getFullYear();

    // Memperbarui teks dengan tahun saat ini
    currentYearElement.textContent = currentYear;
</script>
