<?php $pemilih = tampilPemilih(); if (isset($_POST['btnAddPemilih'])){ tambahPemilih($_POST); } ?>

<div class="page-breadcrumb mb-0 pb-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Data Pemilih</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= baseUrl('page.php?admin=dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= baseUrl('page.php?admin=pemilih') ?>">Pemilih</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Pemilih</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-info text-white">
            <span class="h3">Tambah Data Pemilih</span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                	<form method="post">
                		<div class="form-group">
                			<label for="">Nama Pemilih</label>
                			<input type="text" name="nama_pemilih" class="form-control" placeholder="Masukkan Nama Pemilih" required>
                		</div>
                		<div class="form-group">
                			<label for="">NIM Pemilih</label>
                			<input type="number" name="nim" class="form-control" placeholder="Masukkan NIM Pemilih" required>
                		</div>
                		<div class="form-group">
                			<label for="">Password</label>
                			<input type="password" name="password" class="form-control" placeholder="Password Sama Dengan NIM" readonly disabled>
                		</div>
                		<button type="submit" name="btnAddPemilih" class="btn btn-primary">
                			Simpan
                		</button>
                	</form>
                </div>
            </div>
        </div>
    </div>
</div>
