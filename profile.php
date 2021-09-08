<?php include 'config/koneksi.php'; 

$value = ( isset($_SESSION['admin']) ? $_SESSION['admin']['username'] : $_SESSION['pemilih']['nim'] );
$user  = getUser($value);

$id  = ( isset($_SESSION['admin']) ? "admin" : "pemilih" );
$url = baseUrl("page.php?$id=edit-password");
// var_dump($value); die;
?>

<?php include 'templates/header.php'; ?>

<?php //if (isset($_POST['btnUpdate'])) { updatePasswordUser($_POST, $value); } ?>
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Dashboard</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- Row -->
	<div class="row">
	    <div class="col-lg-8 col-xlg-9 col-md-7">
	        <div class="card">
	            <div class="card-body">
	                <form class="form-horizontal form-material mx-2" method="post" action="<?= $url ?>">
	                    <div class="form-group">
	                        <label class="col-md-12 mb-0">Nama Lengkap</label>
	                        <div class="col-md-12">
	                            <input type="text" disabled readonly class="form-control ps-0 form-control-line" value="<?= (isset($user['nama_pemilih']) ? $user['nama_pemilih'] : $user['username']) ?>">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="example-email" class="col-md-12">Username atau NIM</label>
	                        <?php if (isset($user['nama_pemilih'])): ?>
		                        <div class="col-md-12">
		                            <input type="text" disabled readonly class="form-control ps-0 form-control-line" name="example-email" id="example-email" value="<?= $user['nim'] ?>">
		                        </div>
	                        <?php else: ?>
		                        <div class="col-md-12">
		                            <input type="text" class="form-control ps-0 form-control-line" name="username" id="example-email" value="<?= $user['username'] ?>">
		                        </div>
	                        <?php endif ?>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-md-12 mb-0">Password</label>
	                        <div class="col-md-12">
	                            <input type="password" name="password" placeholder="Masukkan Password Baru" class="form-control ps-0 form-control-line">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <div class="col-sm-12 d-flex">
	                            <button class="btn btn-success mx-auto mx-md-0 text-white" name="btnUpdate">
	                            	Update Profile
	                            </button>
	                        </div>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	    <!-- Column -->
	</div>
<!-- Row -->
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right sidebar -->
<!-- ============================================================== -->
<!-- .right-sidebar -->
<!-- ============================================================== -->
<!-- End Right sidebar -->
<!-- ============================================================== -->
</div>



<?php include 'templates/footer.php'; ?>