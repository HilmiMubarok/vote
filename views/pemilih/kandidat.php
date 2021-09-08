<?php

$kandidat   = tampilKandidat();
$waktu      = getWaktuPemilihan();
$id_pemilih = $_SESSION['pemilih']['id_pemilih'];
$status     = cekStatus($id_pemilih);

?>
<div class="page-breadcrumb mb-0 pb-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Data Kandidat</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= baseUrl('page.php?pemilih=dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kandidat</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="simply-countdown"></div>
    <div class="row">
        
    <?php $no = 1; foreach($kandidat as $k): ?>
    <div class="col">
        <div class="card shadow">
            <img class="" src="assets/images/kandidat/<?= $k['foto_kandidat'] ?>" style="width: 100%; height: 250px;" width="100">
            <div class="card-body">
                <h2 class="text-center">
                    <?= $k['nama_kandidat'] ?> <br>
                    Fakultas <?= $k['fakultas_kandidat'] ?>
                </h2>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <?php if ($status == TRUE && $waktu == TRUE): ?>
                    <button class="btn btn-secondary text-white btn-block btn-lg rounded-0" disabled>
                        Voting
                    </button>
                <?php elseif($status == FALSE && $waktu == TRUE): ?>
                    <a href="?pemilih=pilih-kandidat&id=<?= $k['id_kandidat'] ?>" class="btn btn-danger text-white btn-block btn-lg rounded-0" onclick="return confirm('Yakin ?')">
                        Voting
                    </a>
                <?php else: ?>
                    <button class="btn btn-secondary text-white btn-block btn-lg rounded-0" disabled>
                        Voting
                    </button>
                <?php endif ?>
                <a href="?pemilih=detail-kandidat&id=<?= $k['id_kandidat'] ?>" class="btn btn-info text-white btn-block btn-lg rounded-0">
                    Detail
                </a>
            </div>
        </div>
    </div>
    <?php endforeach ?>
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