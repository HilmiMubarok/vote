<?php $panduan = tampilPanduan(); ?>
<div class="page-breadcrumb mb-0 pb-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Panduan Pemilihan</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= baseUrl('page.php?pemilih=dashboard') ?>">Dashboard</a></li>
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
    		<span class="h3"><?= $panduan['panduan']['judul'] ?></span>
    	</div>
    	<div class="card-body">
            <p>
                <?= $panduan['panduan']['isi'] ?>
            </p>
    	</div>
    </div>
</div>


<script>
    ClassicEditor
        .create( document.querySelector( '#areaIsi' ) )
        .then( editor => {} ).catch( error => {} );
</script>