<?php
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="google-site-verification" content="CasryRDukePkJW0fBTt6NEwQbjXUQxfiX0g8uz_o9sw" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $judul ?></title>
    <link rel="shortcut icon" href="<?= base_url('assets/img/logota.ico') ?>" />
    <link href="<?= base_url('assets/css/myStyles.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/styles.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/templatesStyles.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/jquery.dataTables.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/DataTables/Buttons-1.5.6/css/buttons.bootstrap4.min.css') ?>">
    <style type="text/css">
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark border-bottom border-dark shadow-sm">
        <!-- Navbar Brand-->
        <a class="ms-3 mb-2 d-flex justify-content-start navbar-brand mt-1" href="<?= base_url() ?>dashboard">
            <img class="mt-2 me-3" width="50" src="<?= base_url('assets/img/logota.svg') ?>" alt=""><strong>SIPBMN<div class="text-break">FKIP UNSRI</div></strong>
        </a>
        <!-- Sidebar Toggle-->
        <div class="input-group">
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-md-3 me-4 me-lg-0 ms-4" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $user_login['username'] ?> <i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?= base_url('') ?>ProfileSet">Profile Settings</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('') ?>ActivityLog">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" type="submit" data-bs-toggle="modal" data-bs-target="#modalLogout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <!--QUERY MENU-->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark shadow" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link nav-color" href="<?= base_url() ?>dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            <span>Dashboard</span>
                        </a>
                        <?php
                        if ($user_login['role_id'] == 1) :
                            ?>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                <span>Manajemen Data</span>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-caret-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= base_url() ?>barang">
                                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                        <span>Barang</span>
                                    </a>
                                    <a class="nav-link" href="<?= base_url() ?>jenis">
                                        <div class="sb-nav-link-icon"><i class="fas fa-indent"></i></div>
                                        <span>Jenis</span>
                                    </a>
                                    <a class="nav-link" href="<?= base_url() ?>lokasi">
                                        <div class="sb-nav-link-icon"><i class="fas fa-map-marker-alt"></i></div>
                                        <span>Lokasi</span>
                                    </a>
                                </nav>
                            </div>
                        <?php
                        endif;
                        ?>
                        <?php
                        if ($user_login['role_id'] == 1 or $user_login['role_id'] == 2) : ?>
                            <a class="nav-link nav-color" href="<?= base_url() ?>transaksi_barang">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                <span>Transaksi Barang</span>
                            </a>
                            <a class="nav-link" href="<?= base_url() ?>barang_masuk">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-in-alt"></i></div>
                                <span>Barang Masuk</span>
                            </a>
                            <a class="nav-link" href="<?= base_url() ?>barang_keluar">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                <span>Barang Keluar</span>
                            </a>
                        <?php
                        endif;
                        ?>
                        <?php
                        if ($user_login['role_id'] == 1 or $user_login['role_id'] == 3) :
                            ?>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#laporanPages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                                <span>Laporan</span>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-caret-down"></i></div>
                            </a>
                            <div class="collapse" id="laporanPages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= base_url() ?>laporan/laporan_stok">
                                        <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                                        <span>Laporan Stok Barang</span>
                                    </a>
                                    <a class="nav-link" href="<?= base_url() ?>laporan/laporan_masuk">
                                        <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                                        <span>Laporan Barang Masuk</span>
                                    </a>
                                    <a class="nav-link" href="<?= base_url() ?>laporan/laporan_keluar">
                                        <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                                        <span>Laporan Barang Keluar</span>
                                    </a>
                                </nav>
                            </div>
                        <?php
                        endif;
                        ?>
                        <?php
                        if ($user_login['role_id'] == 1) : { }
                            ?>
                            <a class="nav-link nav-color" href="<?= base_url() ?>data_user">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                                <span>Manajemen User</span>
                            </a>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    Logged in as : <strong><?= $user_login['role'] ?><br></strong>
                    <?= $user_login['username'] ?>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>

            </main>

            <!--Logout Modal  -->
            <div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="<?= base_url() ?>auth/logout">
                                <p>Apakah anda yakin ingin logout ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Logout Modal  -->