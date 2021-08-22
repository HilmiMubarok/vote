<?php $pemilih = tampilPemilih(); if (isset($_POST['btnImportPemilih'])){ importPemilih(); } ?>
<div class="page-breadcrumb mb-0 pb-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Data Pemilih</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= baseUrl('page.php?admin=dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pemilih</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-info text-white">
            <span class="h3">Data Pemilih</span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <a class="btn btn-info text-white" href="?admin=tambah-pemilih">
                            <i class="fas fa-plus"></i> Tambah Data
                        </a>
                        <a class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#modalImportPemilih">
                            <i class="fas fa-download"></i> Import Data
                        </a>
                    </div>
                    <table class="table table-bordered table-striped table-hover" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach($pemilih as $p): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $p['nama_pemilih'] ?></td>
                                <td><?= $p['nim'] ?></td>
                                <td>
                                    <?php if ($p['status'] == 0): ?>
                                        <span class="badge bg-warning">Belum Memilih</span>
                                    <?php else: ?>
                                        <span class="badge bg-success">Sudah Memilih</span>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <a href="?admin=edit-pemilih&id=<?= $p['id_pemilih'] ?>" class="btn btn-success text-white">Edit</a>
                                    <a href="?admin=hapus-pemilih&id=<?= $p['id_pemilih'] ?>" class="btn btn-warning">Hapus</a>
                                    <a href="?admin=reset-pemilih&id=<?= $p['id_pemilih'] ?>" class="btn btn-danger text-white">Reset</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Import -->
<div class="modal fade" id="modalImportPemilih" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Data Pemilih</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Masukkan File Excel</label>
                        <input type="file" name="file" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" name="btnImportPemilih">Import</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
