<?php $panduan = tampilPanduan(); if (isset($_POST['btnUpdatePanduan'])){ updatePanduan($_POST); } ?>
<div class="page-breadcrumb mb-0 pb-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Data Panduan</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= baseUrl('page.php?admin=dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Panduan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
    	<div class="card-header bg-info text-white">
    		<span class="h3">Data Panduan</span>
    	</div>
    	<div class="card-body">
    		<div class="row">
    			<div class="col-12">
                    <form method="POST">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" value="<?= ($panduan['num'] > 0 ? $panduan['panduan']['judul'] : null) ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Isi</label>
                            <textarea name="isi" id="areaIsi" class="form-control"><?= ($panduan['num'] > 0 ? $panduan['panduan']['isi'] : null) ?></textarea>
                        </div>
                        <button type="submit" name="btnUpdatePanduan" class="btn btn-primary">
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
        .create( document.querySelector( '#areaIsi' ) )
        .then( editor => {} ).catch( error => {} );
</script>