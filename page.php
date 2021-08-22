<?php include 'config/koneksi.php'; ?>
<?php include 'templates/header.php'; ?>


<?php

$_GET['admin']   = (isset($_GET['admin']) ? $_GET['admin'] : NULL);
$_GET['pemilih'] = (isset($_GET['pemilih']) ? $_GET['pemilih'] : NULL);

$admin           = $_GET['admin'];
$pemilih         = $_GET['pemilih'];

$page            = [$admin, $pemilih];

switch ($page) {

    // ADMIN

    case ['dashboard', NULL]:
        include 'views/admin/dashboard.php';
        break;

    case ['atur-waktu', NULL]:
        include 'views/admin/atur_waktu.php';
        break;

    case ['get-waktu', NULL]:
        include 'views/admin/get_waktu.php';
        break;

    case ['kandidat', NULL]:
        include "views/admin/kandidat/index.php";
        break;

    case ['tambah-kandidat', NULL]:
        include "views/admin/kandidat/tambah.php";
        break;

    case ['edit-kandidat', NULL]:
        include "views/admin/kandidat/edit.php";
        break;

    case ['reset-kandidat', NULL]:
        include "views/admin/kandidat/reset.php";
        break;

    case ['hapus-kandidat', NULL]:
        include "views/admin/kandidat/hapus.php";
        break;

    case ['pemilih', NULL]:
        include "views/admin/pemilih/index.php";
        break;

    case ['tambah-pemilih', NULL]:
        include "views/admin/pemilih/tambah.php";
        break;

    case ['edit-pemilih', NULL]:
        include "views/admin/pemilih/edit.php";
        break;

    case ['reset-pemilih', NULL]:
        include "views/admin/pemilih/reset.php";
        break;

    case ['hapus-pemilih', NULL]:
        include "views/admin/pemilih/hapus.php";
        break;

    case ['panduan', NULL]:
        include "views/admin/panduan/index.php";
        break;

    case ['manajemen-admin', NULL]:
        include "views/admin/akun/index.php";
        break;

    case ['tambah-admin', NULL]:
        include "views/admin/akun/tambah.php";
        break;

    case ['laporan', NULL]:
        include "views/admin/laporan/index.php";
        break;

    case ['cetak-laporan', NULL]:
        echo "<meta http-equiv='refresh' content='.5;url=views/admin/laporan/cetak.php'>";
        break;

    case ['hasil-pemilihan', NULL]:
        include "views/pemilih/hasil_pemilihan.php";
        break;


    // PEMILIH

    case [NULL, 'dashboard']:
        include "views/pemilih/dashboard.php";
        break;

    case [NULL, 'panduan']:
        include "views/pemilih/panduan.php";
        break;

    case [NULL, 'kandidat']:
        include "views/pemilih/kandidat.php";
        break;

    case [NULL, 'detail-kandidat']:
        include "views/pemilih/detail_kandidat.php";
        break;

    case [NULL, 'pilih-kandidat']:
        include "views/pemilih/pilih_kandidat.php";
        break;

    case [NULL, 'hasil-pemilihan']:
        include "views/pemilih/hasil_pemilihan.php";
        break;

    default:
        echo "<meta http-equiv='refresh' content='.5;url=index.php'>";
        break;
}

// switch ($_GET['page']) {

//     case 'atur-waktu':
//         include 'atur_waktu.php';
//         break;

//     case 'get-waktu':
//         include 'get_waktu.php';
//         break;

//     case 'kandidat':
//         include "kandidat/index.php";
//         break;

//     case 'tambah-kandidat':
//         include "kandidat/tambah.php";
//         break;

//     case 'edit-kandidat':
//         include "kandidat/edit.php";
//         break;

//     case 'reset-kandidat':
//         include "kandidat/reset.php";
//         break;

//     case 'hapus-kandidat':
//         include "kandidat/hapus.php";
//         break;

//     case 'pemilih':
//         include "pemilih/index.php";
//         break;

//     case 'tambah-pemilih':
//         include "pemilih/tambah.php";
//         break;

//     case 'edit-pemilih':
//         include "pemilih/edit.php";
//         break;

//     case 'reset-pemilih':
//         include "pemilih/reset.php";
//         break;

//     case 'hapus-pemilih':
//         include "pemilih/hapus.php";
//         break;

//     case 'panduan':
//         include "panduan/index.php";
//         break;

//     default:
//         include "home.php";
//         break;
// }


?>


<?php include 'templates/footer.php'; ?>
