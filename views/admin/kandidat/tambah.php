<?php $kandidat = tampilKandidat(); if (isset($_POST['btnAddKandidat'])){ tambahKandidat($_POST, $_FILES); } ?>

<div class="page-breadcrumb mb-0 pb-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Data Kandidat</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= baseUrl('page.php?admin=dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= baseUrl('page.php?admin=kandidat') ?>">Kandidat</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Kandidat</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-info text-white">
            <span class="h3">Tambah Data Kandidat</span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                	<form method="post" enctype="multipart/form-data">
                		<div class="form-group">
                			<label for="">Nama Kandidat</label>
                			<input type="text" name="nama_kandidat" class="form-control" placeholder="Masukkan Nama Kandidat">
                		</div>
                		<div class="form-group">
                            <label>Foto Kandidat</label>
                            <input type="file" name="foto_kandidat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Fakultas Kandidat</label>
                            <input type="text" name="fakultas_kandidat" class="form-control" placeholder="Masukkan Fakulatas Kandidat">
                        </div>
                        <div class="form-group">
                            <label>Visi Kandidat</label>
                            <textarea name="visi_kandidat" class="form-control" id="areaVisi"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Misi Kandidat</label>
                            <textarea name="misi_kandidat" class="form-control" id="areaMisi"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Proker Kandidat</label>
                            <textarea name="proker_kandidat" class="form-control" id="areaProker"></textarea>
                        </div>
                		<button type="submit" name="btnAddKandidat" class="btn btn-primary">
                			Simpan
                		</button>
                	</form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    ClassicEditor
        .create( document.querySelector( '#areaVisi' ) )
        .then( editor => {} ).catch( error => {} );
    ClassicEditor
        .create( document.querySelector( '#areaMisi' ) )
        .then( editor => {} ).catch( error => {} );
    ClassicEditor
        .create( document.querySelector( '#areaProker' ) )
        .then( editor => {} ).catch( error => {} );
</script>