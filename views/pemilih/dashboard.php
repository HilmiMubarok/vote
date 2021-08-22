<div class="page-breadcrumb mb-0 pb-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Dashboard Pemilih</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
	<!-- <div class="text-center"> -->
	<!-- </div> -->
	<div class="mt5">
		<div class="alert alert-primary bg-primary text-white text-center p-5">
			<h1>
				Selamat Datang di Aplikasi <br> E-Voting Pemilihan Ketua BEM
			</h1>
			<p class="mt-3" style="font-size: 20px">
				Silahkan Lihat Panduan Pemilihan Sebelum Melakukan Voting
			</p>
		</div>
	</div>
	<div class="text-center h3 mt-3">Sisa Waktu Pemilihan</div>
	<div class="simply-countdown">
	</div>
</div>

<script>
    $(document).ready(function () {
        getWaktu()
    })

    function getWaktu() {
        var url = "<?= baseUrl('get_waktu.php') ?>";
        $.ajax({
            url : url,
            type: "GET",
            success: function (res) {
                var tgl = new Date(res.waktu_selesai)
                showCount('.simply-countdown', tgl)
            },
            error: function (response) {
                if (response.responseText == 200) {
                    showZeroCount('.simply-countdown')
                }
            }
        })
    }

    
    
</script>