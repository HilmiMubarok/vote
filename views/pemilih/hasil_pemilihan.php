<?php

$kandidat   = tampilKandidat();

?>
<div class="page-breadcrumb mb-0 pb-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Hasil Pemilihan</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= baseUrl('page.php?pemilih=dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Hasil Pemilihan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <!-- <div class="chart-container" style="width:500px;">
    </div> -->
    <div class="row">
        <div class="col-6">
            
            <canvas id="myChart"></canvas>
        </div>
        <div class="col-6">
            <h3>Jumlah Suara Sementara</h3>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nama Kandidat</th>
                        <th>Suara Sementara</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kandidat as $k): ?>
                        <tr>
                            <td><?= $k['nama_kandidat'] ?></td>
                            <td><?= lihatSuaraPerKandidat($k['id_kandidat']) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<script>

    var url = "<?= baseUrl('get_kandidat.php') ?>";
    $.ajax({
        url : url,
        type: "GET",
        success: function (res) {
            var label = [];
            var value = [];
            for (var i in res) {
                label.push(res[res.length - 1][i]);
            }
            res.splice(-1,1);
            for (var i in res) {
                value.push(res[i].nama_kandidat);
            }

            // console.log(label)
            // console.log(value)
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: value,
                    datasets: [{
                        data: label,
                        backgroundColor: [
                          'rgb(25, 25, 86)',
                          'rgb(255, 99, 132)',
                          'rgb(54, 162, 235)',
                          'rgb(255, 205, 86)',
                          'rgb(255, 25, 86)',
                          'rgb(55, 25, 86)',
                        ],
                    }]
                },
                options: {}
            });
        }
    })
</script>
