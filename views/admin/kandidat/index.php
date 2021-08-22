<?php $kandidat = tampilKandidat(); ?>
<div class="page-breadcrumb mb-0 pb-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Data Kandidat</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= baseUrl('page.php?admin=dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kandidat</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
    	<div class="card-header bg-info text-white">
    		<span class="h3">Data Kandidat</span>
    	</div>
    	<div class="card-body">
    		<div class="row">
    			<div class="col-12">
    				<a href="?admin=tambah-kandidat" class="btn btn-info text-white">
    					<i class="fas fa-plus"></i> Tambah Data
    				</a>
    				<table class="mt-3 table table-bordered table-striped table-hover">
    					<thead>
    						<tr>
    							<th>No</th>
    							<th>Nama</th>
    							<th>Foto</th>
    							<th>Visi</th>
    							<th>Misi</th>
    							<th>Proker</th>
    							<th>Aksi</th>
    						</tr>
    					</thead>
    					<tbody>
						<?php $no = 1; foreach($kandidat as $k): ?>
    						<tr>
    							<td><?= $no++ ?></td>
    							<td><?= $k['nama_kandidat'] ?></td>
    							<td>
                                    <img src="assets/images/kandidat/<?= $k['foto_kandidat'] ?>" width="100" class="img-fluid">
                                </td>
    							<td><?= $k['visi'] ?></td>
    							<td><?= $k['misi'] ?></td>
    							<td><?= $k['proker'] ?></td>
    							<td>
    								<a href="?admin=edit-kandidat&id=<?= $k['id_kandidat'] ?>" class="btn btn-warning text-white">Edit</a>
    								<a href="?admin=hapus-kandidat&id=<?= $k['id_kandidat'] ?>" class="btn btn-danger text-white">Hapus</a>
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

