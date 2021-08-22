<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Dashboard</h3>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <div class="card shadow bg-info text-white">
                <div class="card-body">
                    <span class="h4"><?= jumlahKandidat() ?></span>
                    <h3>Jumlah Kandidat</h3>
                </div>
                <a href="?admin=kandidat" class="card-footer text-white text-center">
                    selengkapnya <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow text-white bg-primary">
                <div class="card-body">
                    <span class="h4"><?= jumlahPemilih() ?></span>
                    <h3>Jumlah Pemilih</h3>
                </div>
                <a href="?admin=pemilih" class="card-footer text-white text-center">
                    selengkapnya <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow text-white bg-success">
                <div class="card-body">
                    <span class="h4"><?= sudahMilih() ?></span>
                    <h3>Sudah Memilih</h3>
                </div>
                <a href="?admin=pemilih" class="card-footer text-white text-center">
                    Selengkapnya <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow text-white bg-danger">
                <div class="card-body">
                    <span class="h4"><?= belumMilih() ?></span>
                    <h3>Belum Memilih</h3>
                </div>
                <a href="?admin=pemilih" class="card-footer text-white text-center">
                    selengkapnya <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-3 text-center">
            <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalBuka">MULAI PEMILIHAN</button>
            <div class="simply-countdown"></div>
        </div>
    </div>
</div>


<!-- Modal Import -->
<div class="modal fade" id="modalBuka" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Set Waktu Pemilihan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-data" method="POST">
                <div class="form-group">
                    <label for="">Atur Waktu (Jam)</label>
                    <!-- <input type="number" id="jam" class="form-control"> -->
                    <input id="jam" name="jam" type="datetime-local" class="form-control"></input>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="btnMulaiPemilihan" onclick="cd()">Mulai</button>
                </form>
            </div>
        </div>
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

    function cd() {
        let tgl  = document.getElementById('jam').value;
        tgl      = new Date(tgl);
        var url  = "<?= baseUrl('atur_waktu.php') ?>";
        var data = {
            'waktu_selesai': tgl 
        }
        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: function (response) {
                window.location.reload()
            }
        });
        
        
    }
    
</script>