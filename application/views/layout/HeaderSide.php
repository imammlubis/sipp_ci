<!DOCTYPE html>

<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Binaperta</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author:imamlubis" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>application/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>application/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>application/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>application/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url();?>application/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>application/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>application/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>application/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo base_url();?>application/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?php echo base_url();?>application/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?php echo base_url();?>application/assets/layouts/layout3/css/layout.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>application/assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="<?php echo base_url();?>application/assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <!--link rel="shortcut icon" href="favicon.ico" /--> 
    </head>
<!-- END HEAD -->
<body class="page-container-bg-solid">
    <div class="page-wrapper-row">
        <div class="page-wrapper-top">
        <!-- BEGIN HEADER -->
            <div class="page-header">
                <!-- BEGIN HEADER TOP -->
                <div class="page-header-top">
                    <div class="container">
                        <!-- BEGIN LOGO -->
                        <div class="page-logo">
                            <a href="<?php echo base_url();?>">
                                <img src="<?php echo base_url();?>application/assets/pages/img/binapenta-logo1.png" alt="logo" class="logo-default">
                            </a>
                        </div>
                        <!-- END LOGO -->
                        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                        <a href="javascript:;" class="menu-toggler"></a>
                        <!-- END RESPONSIVE MENU TOGGLER -->
                        <!-- BEGIN TOP NAVIGATION MENU -->
                        <div class="top-menu">
                            <ul class="nav navbar-nav pull-right">
                                <!-- BEGIN USER LOGIN DROPDOWN -->
                                <li class="dropdown dropdown-user dropdown-dark">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <img alt="" class="img-circle" src="<?php echo base_url();?>application/assets/layouts/layout3/img/avatar9.jpg">
                                        <span class="username username-hide-mobile">
                                            <?php
                                                echo $this->session->userdata('user_name');
                                            ?>
                                        </span>
                                    </a>
<!--                                    <ul class="dropdown-menu dropdown-menu-default">-->
<!--                                        <li>-->
<!--                                            <a href="page_user_profile_1.html">-->
<!--                                                <i class="icon-user"></i> My Profile </a>-->
<!--                                        </li>-->
<!---->
<!--                                        <li class="divider"> </li>-->
<!--                                        <li>-->
<!--                                            <a href="page_user_login_1.html">-->
<!--                                                <i class="icon-key"></i> Log Out </a>-->
<!--                                        </li>-->
<!--                                    </ul>-->
                                </li>
                                <li class="dropdown dropdown-quick-sidebar-toggler">
                                    <a href="<?php echo base_url();?>account/login/logout" class="dropdown-toggle" data-toggle="LogOut">
                                        <i class="icon-logout"></i>
                                    </a>
                                </li>
                                <!-- END USER LOGIN DROPDOWN -->
                            </ul>
                        </div>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                </div>
                <!-- END HEADER TOP -->
                <!-- BEGIN HEADER MENU -->
                <div class="page-header-menu">
                    <div class="container">
                        <!-- BEGIN MEGA MENU -->
                        <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                        <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                        <div class="hor-menu ">
                            <ul class="nav navbar-nav">
                                <li class="menu-dropdown classic-menu-dropdown ">
                                    <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
                                        Direktorat PPK <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-left">
                                        <li class=" dropdown-submenu">
                                            <a href=":;" class="nav-link  active">
                                                <i class="icon-bar-chart"></i> Pencari Kerja Terdaftar
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="<?php echo base_url();?>DirektoratPKK/PencariKerjaTerdaftar">
                                                        <i class="icon-bar-chart"></i> Menurut Provinsi </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="<?php echo base_url();?>DirektoratPKK/PencariKerjaTerdaftarByJK">
                                                        <i class="icon-bar-chart"></i> Menurut Jenis Kelamin </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class=" dropdown-submenu">
                                            <a href=":;" class="nav-link  ">
                                                <i class="icon-bulb"></i> Lowongan Kerja Terdaftar
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="<?php echo base_url();?>DirektoratPKK/LowonganKerjaTerdaftar">
                                                        <i class="icon-bulb"></i> Menurut Provinsi </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="<?php echo base_url();?>DirektoratPKK/LowonganKerjaTerdaftarByJK">
                                                        <i class="icon-bulb"></i> Menurut Jenis Kelamin </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class=" dropdown-submenu">
                                            <a href="dashboard_3.html" class="nav-link  ">
                                                <i class="icon-graph"></i> Penempatan Kerja
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="<?php echo base_url();?>DirektoratPKK/PenempatanKerjaByProvinsi">
                                                        <i class="icon-graph"></i> Menurut Provinsi </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="<?php echo base_url();?>DirektoratPKK/PenempatanKerjaByJK">
                                                        <i class="icon-graph"></i> Menurut Jenis Kelamin </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-dropdown classic-menu-dropdown ">
                                    <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
                                     Direktorat PTKDN
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-left">
                                        <li class=" dropdown-submenu">
                                            <a href=":;" class="nav-link active">
                                                <i class="icon-bar-chart"></i> Rekap Jabatan Fungsional Pengantar Kerja
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="<?php echo base_url();?>DirektoratPTKDN/RekapFungsionalPusat">
                                                        <i class="icon-bar-chart"></i> Pusat </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="<?php echo base_url();?>DirektoratPTKDN/RekapFungsionalDaerah">
                                                        <i class="icon-bar-chart"></i> Daerah </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class=" ">
                                            <a href="<?php echo base_url();?>DirektoratPTKDN/LaporanPenempatanAkad"> Laporan Penempatan AKAD </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?php echo base_url();?>DirektoratPTKDN/LPTKS"> Data LPTKS </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?php echo base_url();?>DirektoratPTKDN/RincianLokasiPengembangan" class="nav-link  "> Rincian Lokasi Pengembangan Ruang Pelayanan </a>
                                        </li>

                                        <li class=" dropdown-submenu">
                                            <a href="dashboard_3.html" class="nav-link  ">
                                                <i class="icon-graph"></i> Pengadaan Sarana Bursa Kerja Online
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="<?php echo base_url();?>DirektoratPTKDN/PengadaanSaranaBursaKerjaOnline">
                                                        <i class="icon-graph"></i> Bursa Kerja Pemerintah </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="<?php echo base_url();?>DirektoratPTKDN/RekapitulasiPengadaan">
                                                        <i class="icon-graph"></i> Bursa Kerja Khusus </a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class=" ">
                                            <a href="<?php echo base_url();?>DirektoratPTKDN/RekapitulasiJobfairNasional" class="nav-link  "> JobFair Nasional </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?php echo base_url();?>DirektoratPTKDN/LokasiPemberdayaanTKKMuda" class="nav-link  "> Lokasi Pemberdayaan Tenaga Kerja Khusus Muda & Wanita </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?php echo base_url();?>DirektoratPTKDN/LokasiPemberdayaanTKKLansia" class="nav-link  "> Lokasi Pemberdayaan Tenaga Kerja Lansia & Disabilitas </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?php echo base_url();?>DirektoratPTKDN/PemberdayaanTenagaMudaDanWanita" class="nav-link  "> Pemberdayaan Tenaga Kerja Muda & Wanita </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?php echo base_url();?>DirektoratPTKDN/PembekalanTenagaKerjaDisabilitas" class="nav-link  "> Pembekalan Tenaga Kerja Disabilitas </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?php echo base_url();?>DirektoratPTKDN/PembekalanTKLansia" class="nav-link  "> Pembekalan Tenaga Kerja Lansia </a>
                                        </li>
<!--                                        <li class=" ">-->
<!--                                            <a href="--><?php //echo base_url();?><!--DirektoratPTKDN/RekapFungsionalDaerah" class="nav-link  "> Pemberdayaan Tenaga Kerja Muda dan Wanita </a>-->
<!--                                        </li>-->
<!--                                        <li class=" ">-->
<!--                                            <a href="--><?php //echo base_url();?><!--DirektoratPTKDN/RekapFungsionalDaerah" class="nav-link  "> Pembekalan Tenaga Kerja Khusus (Disabilitas) </a>-->
<!--                                        </li>-->
<!--                                        <li class=" ">-->
<!--                                            <a href="--><?php //echo base_url();?><!--DirektoratPTKDN/RekapFungsionalDaerah" class="nav-link  "> Pembekalan Tenaga Kerja Khusus (Lansia) </a>-->
<!--                                        </li>-->
<!--                                        <li class=" ">-->
<!--                                            <a href="--><?php //echo base_url();?><!--DirektoratPTKDN/RekapFungsionalDaerah" class="nav-link  "> Pemberdayaan Tenaga Kerja Muda dan Wanita (Optimalisasi) </a>-->
<!--                                        </li>-->
<!--                                        <li class=" ">-->
<!--                                            <a href="--><?php //echo base_url();?><!--DirektoratPTKDN/RekapFungsionalDaerah" class="nav-link  "> Pemberdayaan Tenaga Kerja Disabilitas dan Lansia (Optimalisasi) </a>-->
<!--                                        </li>-->
                                    </ul>
                                </li>
                                <li class="menu-dropdown classic-menu-dropdown ">
                                    <a href="javascript:;">
                                        <i class="icon-briefcase"></i> Direktorat PTKLN
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu pull-left">
                                        <li class="">
                                            <a href="<?php echo base_url();?>DirektoratPTKLN/JumlahPenempatanTKI" class="nav-link nav-toggle ">
                                                Jumlah Penempatan Kerja TKI
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo base_url();?>DirektoratPTKLN/PenerimaanRemitansi" class="nav-link nav-toggle ">
                                                Data Penerimaan Remitansi Tenaga Kerja Indonesia
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo base_url();?>DirektoratPTKLN/JumlahPPTKIS" class="nav-link nav-toggle ">
                                                Rekapitulasi Jumlah PPTKIS
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo base_url();?>DirektoratPTKLN/AnggaranAtase" class="nav-link nav-toggle ">
                                                Anggaran Atase
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?php echo base_url();?>DirektoratPPKK/PendayagunaanTKS" class="nav-link nav-toggle ">
                                                Realisasi Pendayagunaan TKS
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?php echo base_url();?>DirektoratPPKK/LokasiDanaDroppingSektorPertanianDanMaritim" class="nav-link nav-toggle ">
                                                Rekapitulasi Lokasi Dana Dropping Kegiatan Pemberdayaan Masyarakat
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?php echo base_url();?>DirektoratPPKK/LokasiDanaDroppingSektorJasaDanIndustriKreatif" class="nav-link nav-toggle ">
                                                Rekapitulasi Lokasi Dana Dropping Kegiatan Pemberdayaan Masyarakat Sektor JAsa dan Industri Kreatif
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menu-dropdown classic-menu-dropdown ">
                                    <a href="javascript:;">
                                        <i class="icon-briefcase"></i> Direktorat PPTKA
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu pull-left">
                                        <li class="">
                                            <a href="<?php echo base_url();?>DirektoratPPTKA/DaftarIzinKategoriSektor" class="nav-link nav-toggle ">
                                                Daftar Izin Mempekerjakan TKA yang diterbitkan berdasarkan kategori sektor
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo base_url();?>DirektoratPPTKA/JumlahRencanaPenggunaanTKA" class="nav-link nav-toggle ">
                                                Jumlah Rencana Penggunaan Tenaga Kerja Asing (RPTKA)
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo base_url();?>DirektoratPPTKA/DaftarIzinKategoriNegara" class="nav-link nav-toggle ">
                                                Daftar Izin Mempekerjakan TKA yang diterbitkan berdasarkan kategori Negara
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo base_url();?>DirektoratPPTKA/DaftarIzinTKABerdasarkanJabatan" class="nav-link nav-toggle ">
                                                Daftar Izin Mempekerjakan TKA yang diterbitkan Periode berdasarkan Jabatan
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-dropdown classic-menu-dropdown ">
                                    <a href="javascript:;">
                                        <i class="icon-briefcase"></i> Direktorat BBPPK & PKK
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu pull-left">
                                        <li class="">
                                            <a href="<?php echo base_url();?>DirektoratBBPPKnPKK/PembekalanMotivator" class="nav-link nav-toggle ">
                                                <i class="icon-basket"></i> Realilasi Pembekalan Motivator
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo base_url();?>DirektoratBBPPKnPKK/PengembanganTenagaKerjaRentan" class="nav-link nav-toggle ">
                                                <i class="icon-docs"></i> Persebaran Program Pengembangan Tenaga Kerja Rentan
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- END MEGA MENU -->
                    </div>
                </div>
                <!-- END HEADER MENU -->
            </div>
        <!-- END HEADER -->
        </div>
    </div>
    <div class="page-wrapper-row full-height">
        <div class="page-wrapper-middle">
            <!-- BEGIN CONTAINER -->