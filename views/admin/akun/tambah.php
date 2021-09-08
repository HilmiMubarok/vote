<?php if (isset($_POST['btnAddAdmin'])){ tambahAdmin($_POST); } ?>

<div class="page-breadcrumb mb-0 pb-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Data Kandidat</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= baseUrl('page.php?admin=dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= baseUrl('page.php?admin=manajemen-admin') ?>">Manajemen Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Admin</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-info text-white">
            <span class="h3">Tambah Data Admin</span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                	<form method="post" enctype="multipart/form-data">
                		<div class="form-group">
                			<label for="">Username</label>
                			<input type="text" name="username" class="form-control" placeholder="Masukkan Username Admin" required>
                		</div>
                		<div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password Admin" required>
                        </div>
                		<button type="submit" name="btnAddAdmin" class="btn btn-primary">
                			Simpan
                		</button>
                	</form>
                </div>
            </div>
        </div>
    </div>
</div>

