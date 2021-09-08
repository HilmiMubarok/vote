<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>E Voting BEM UNISS</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="monster-html/css/style.min.css" rel="stylesheet">
    <link href="assets/css/simplyCountdown.theme.default.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="monster-html/css/style.min.css" rel="stylesheet">

    <script src="assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="monster-html/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="monster-html/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="monster-html/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="assets/js/simplyCountdown.min.js"></script>

    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="assets/js/ckeditor.js"></script>
    <script type="text/javascript" src="assets/js/custom.js"></script>
    <script type="text/javascript" src="monster-html/js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="#!">
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- <i class="far fa-user"></i> -->
                            <!-- Dark Logo icon -->
                            <!-- <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" /> -->

                        <!-- </b> -->
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <!-- <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" /> -->
                            <h3 class="text-dark">E-Voting BEM UNISS</h3>
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto mt-md-0 "></ul>

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="<?= baseUrl('profile.php') ?>" role="button">
                                <!-- <img src="assets/images/users/1.jpg" alt="user" class="profile-pic me-2"> -->
                                <?= (isset($_SESSION['admin']) ? $_SESSION['admin']['username'] : $_SESSION['pemilih']['nama_pemilih'] ) ?>
                            </a>
                            <ul class="dropdown-menu show" aria-labelledby="navbarDropdown"></ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <?php if (isset($_SESSION['admin'])): ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= baseUrl('page.php?admin=dashboard') ?>" aria-expanded="false"><i class="fas fa-tachometer-alt me-3 fa-fw"></i><span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <?php else: ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= baseUrl('page.php?pemilih=dashboard') ?>" aria-expanded="false"><i class="fas fa-tachometer-alt me-3 fa-fw"></i><span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <?php endif ?>
                        <?php if (isset($_SESSION['admin'])): ?>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= baseUrl('page.php?admin=pemilih') ?>" aria-expanded="false">
                                    <i class="me-3 fas fa-users fa-fw" aria-hidden="true"></i><span class="hide-menu">Data Pemilih</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= baseUrl('page.php?admin=kandidat') ?>" aria-expanded="false">
                                    <i class="me-3 fas fa-user-circle fa-fw" aria-hidden="true"></i><span class="hide-menu">Data Kandidat</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= baseUrl('page.php?admin=panduan') ?>" aria-expanded="false">
                                    <i class="me-3 fas fa-book fa-fw" aria-hidden="true"></i><span class="hide-menu">Panduan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= baseUrl('page.php?admin=hasil-pemilihan') ?>" aria-expanded="false">
                                    <i class="me-3 fas fa-archive fa-fw" aria-hidden="true"></i><span class="hide-menu">Hasil Pemilihan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= baseUrl('page.php?admin=laporan') ?>" aria-expanded="false">
                                    <i class="me-3 fas fa-clipboard fa-fw" aria-hidden="true"></i><span class="hide-menu">Laporan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= baseUrl('page.php?admin=manajemen-admin') ?>" aria-expanded="false">
                                    <i class="me-3 fas fa-user-plus fa-fw" aria-hidden="true"></i><span class="hide-menu">Manajemen Admin</span>
                                </a>
                            </li>
                            <?php else: ?>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= baseUrl('page.php?pemilih=panduan') ?>" aria-expanded="false">
                                        <i class="me-3 fas fa-bookmark fa-fw" aria-hidden="true"></i><span class="hide-menu">Panduan</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= baseUrl('page.php?pemilih=kandidat') ?>" aria-expanded="false">
                                        <i class="me-3 fas fa-users fa-fw" aria-hidden="true"></i><span class="hide-menu">Kandidat</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= baseUrl('page.php?pemilih=hasil-pemilihan') ?>" aria-expanded="false">
                                        <i class="me-3 fas fa-book fa-fw" aria-hidden="true"></i><span class="hide-menu">Hasil Pemilihan</span>
                                    </a>
                                </li>
                        <?php endif ?>
                        <li class="text-center">
                            <a href="<?= baseUrl('logout.php') ?>" class="btn btn-danger btn-block text-white mt-4">
                                Logout
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
