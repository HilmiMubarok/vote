<?php $kandidat = editKandidat($_GET['id']); ?>
<div class="page-breadcrumb mb-0 pb-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Data Kandidat</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= baseUrl('page.php?pemilih=dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= baseUrl('page.php?pemilih=kandidat') ?>">Kandidat</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Kandidat</li>
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
		<div class="card">
            <div class="card-header bg-info text-white p-3">
                <span class="h3"><?= $kandidat['nama_kandidat'] ?></span>
            </div>
            <div class="card-body">
                
    			<div class="row">
                    <div class="col-6">
                        <img src="assets/images/kandidat/<?= $kandidat['foto_kandidat'] ?>" width="300">
                    </div>
                    <div class="col-6">
                        <table class="table table-bordered table-striped"> 
                        	<tr>
                                <th>Nama</th>
                                <td><?= $kandidat['nama_kandidat'] ?></td>
                            </tr>
                            <tr>
                                <th>Fakultas</th>
                                <td><?= $kandidat['fakultas_kandidat'] ?></td>
                            </tr> 
                            <tr>
                                <th>Visi</th>
                                <td><?= $kandidat['visi'] ?></td>
                            </tr>
                            <tr>
                                <th>Misi</th>
                                <td><?= $kandidat['misi'] ?></td>
                            </tr>
                            <tr>
                                <th>Program Kerja</th>
                                <td><?= $kandidat['proker'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
            	<a href="?pemilih=kandidat" class="btn btn-info text-white">Kembali</a>
            </div>
		</div>
	</div>
	</div>
</div>
