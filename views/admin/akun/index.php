<?php $admin = tampilAdmin(); ?>
<div class="page-breadcrumb mb-0 pb-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Data Admin</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= baseUrl('page.php?admin=dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admin</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
    	<div class="card-header bg-info text-white">
    		<span class="h3">Data Admin</span>
    	</div>
    	<div class="card-body">
    		<div class="row">
    			<div class="col-12">
    				<a href="?admin=tambah-admin" class="btn btn-info text-white">
    					<i class="fas fa-plus"></i> Tambah Data
    				</a>
    				<table class="mt-3 table table-bordered table-striped table-hover">
    					<thead>
    						<tr>
    							<th>No</th>
    							<th>Username</th>
                                <th>Password</th>
    						</tr>
    					</thead>
    					<tbody>
						<?php $no = 1; foreach($admin as $a): ?>
    						<tr>
    							<td><?= $no++ ?></td>
    							<td><?= $a['username'] ?></td>
                                <td><?= $a['password'] ?></td>
    						</tr>
						<?php endforeach ?>
    					</tbody>
    				</table>
    			</div>
    		</div>
    	</div>
    </div>
</div>

