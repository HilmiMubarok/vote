<?php $kandidat = tampilKandidat(); ?>
<div class="page-breadcrumb mb-0 pb-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Laporan Pemilihan</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= baseUrl('page.php?admin=dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
    	<div class="card-header bg-info text-white">
    		<span class="h3">Laporan Pemilihan</span>
    	</div>
    	<div class="card-body">

    		<form action="<?= baseUrl('views/admin/laporan/cetak.php') ?>" method="post">
                <div class="form-group">
                    <label>Nama Ketua Pelaksana</label>
                    <input type="text" name="ketua" class="form-control" required>
                </div>  
                <div class="form-group">
                    <label>NIM Ketua Pelaksana</label>
                    <input type="number" name="nim_ketua" class="form-control" required>
                </div> 
                <div class="form-group">
                    <label>Nama Sekertaris</label>
                    <input type="text" name="sekertaris" class="form-control" required>
                </div>      
                <div class="form-group">
                    <label>NIM Sekertaris</label>
                    <input type="number" name="nim_sekertaris" class="form-control" required>
                </div>       
                <div class="form-group">
                    <label>Hari Pelaksanaan</label>
                    <input type="date" name="hari_pelaksanaan" class="form-control" required>
                </div>      
                <button type="submit" class="btn btn-primary">Cetak</button>
            </form>
    	</div>
    </div>
</div>

