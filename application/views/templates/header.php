<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>SPK AHP Penentuan UMKM Terbaik</title>

   <!-- Custom fonts for this template-->
   <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

   <!-- Page level plugin CSS-->
   <link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

   <!-- Custom styles for this template-->
   <link href="<?php echo base_url() ?>assets/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

   <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
         <i class="fas fa-bars"></i>
      </button>

      <a class="navbar-brand mr-1" href="index.html">SPK AHP Penentuan UMKM Terbaik</a>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
         <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
               <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
         </li>
      </ul>

   </nav>

   <div id="wrapper">
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
         <?php if ($this->session->userdata('role') == 1) { ?>
            <li class="nav-item <?php if (getUri() == "dashboard") {
                                    echo "active";
                                 } ?>">
               <a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">
                  <i class="fas fa-fw fa-tachometer-alt"></i>
                  <span>Dashboard</span>
               </a>
            </li>
            <li class="nav-item <?php if (getUri() == "kriteria") {
                                    echo "active";
                                 } ?>">
               <a class="nav-link" href="<?php echo base_url('admin/kriteria') ?>">
                  <i class="fas fa-fw fa-server"></i>
                  <span>Kriteria</span></a>
            </li>
            <li class="nav-item <?php if (getUri() == "alternatif") {
                                    echo "active";
                                 } ?>">
               <a class="nav-link" href="<?php echo base_url('admin/alternatif') ?>">
                  <i class="fas fa-fw fa-database"></i>
                  <span>Alternatif</span></a>
            </li>
            <li class="nav-item <?php if (getUri() == "perbandingan_kriteria") {
                                    echo "active";
                                 } ?>">
               <a class="nav-link" href="<?php echo base_url('admin/perbandingan_kriteria') ?>">
                  <i class="fas fa-fw fa-chart-area"></i>
                  <span>Perbandingan Kriteria</span></a>
            </li>
            <li class="nav-item <?php if (getUri() == "perbandingan_alternatif") {
                                    echo "active";
                                 } ?>">
               <a class="nav-link" href="<?php echo base_url('admin/perbandingan_alternatif') ?>">
                  <i class="fas fa-fw fa-chart-area"></i>
                  <span>Perbandingan Alternatif</span></a>
            </li>
            <li class="nav-item <?php if (getUri() == "hasil") {
                                    echo "active";
                                 } ?>">
               <a class="nav-link" href="<?php echo base_url('admin/hasil') ?>">
                  <i class="fas fa-fw fa-table"></i>
                  <span>Hasil</span></a>
            </li>
         <?php } else if ($this->session->userdata('role') == 2) { ?>
            <li class="nav-item <?php if (getUri() == "laporan_hasil") {
                                    echo "active";
                                 } ?>">
               <a class="nav-link" href="<?php echo base_url('user/laporan_hasil') ?>">
                  <i class="fas fa-fw fa-table"></i>
                  <span>Laporan Hasil</span>
               </a>
            </li>
         <?php } ?>
      </ul>

      <div id="content-wrapper">

         <div class="container-fluid">