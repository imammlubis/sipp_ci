<!DOCTYPE html>

<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>sippminerba</title>
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
    <link href="<?php echo base_url();?>application/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>application/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>application/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>application/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>application/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo base_url();?>application/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?php echo base_url();?>application/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url();?>application/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />

    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?php echo base_url();?>application/assets/layouts/layout3/css/layout.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>application/assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="<?php echo base_url();?>application/assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />

<!--    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />-->

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
                            <a href="<?php echo base_url();?>account/User/home">
                                <img src="http://104.215.255.122:82/Content/assets/layouts/img/logo_ESDM.png" alt="logo" class="logo-default">
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
                                                echo $this->session->userdata('logged_in')['fname'].' '.$this->session->userdata('logged_in')['lname'];
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
                                    <a href="<?php echo base_url('account/user/logout'); ?>" class="dropdown-toggle" data-toggle="LogOut">
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
                                        <i class="icon-briefcase"></i> Tagihan <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-left">
                                        <li class=" ">
                                            <a href="<?php echo base_url();?>tagihan/TagihanAwal">
                                                <i class="icon-bulb"></i> Tagihan Awal </a>
                                        </li>
<!--                                        <li class=" ">-->
<!--                                            <a href="--><?php //echo base_url();?><!--DirektoratPTKDN/LaporanPenempatanAkad">-->
<!--                                                <i class="icon-bulb"></i> Sisa Tagihan </a>-->
<!--                                        </li>-->
                                        <li class=" ">
                                            <a href="<?php echo base_url();?>perusahaan/DaftarPembayaran">
                                                <i class="icon-bulb"></i> Daftar Pembayaran </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?php echo base_url();?>perusahaan/ApprovedRejectedPage">
                                                <i class="icon-bulb"></i> Daftar Pembayaran Diapprove & Direject </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-dropdown classic-menu-dropdown ">
                                    <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
                                     Perusahaan
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-left">
                                        <li class=" ">
                                            <a href="<?php echo base_url();?>perusahaan/dataperusahaan">
                                                <i class="icon-bulb"></i> Data Perusahaan </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?php echo base_url();?>perusahaan/datapengguna">
                                                <i class="icon-bulb"></i> Data User </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-dropdown classic-menu-dropdown ">
                                    <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
                                        Laporan
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-left">
                                        <li class=" ">
                                            <a href="<?php echo base_url();?>laporan/LaporanPiutang">
                                                <i class="icon-bulb"></i> Laporan Piutang </a>
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