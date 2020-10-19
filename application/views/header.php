<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/favicon.png')?>"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" />
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css'); ?>" />
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/iconic/css/material-design-iconic-font.min.css'); ?>" />
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/linearicons-v1.0.0/icon-font.min.css'); ?>" />
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/animate/animate.css') ?>" />
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/css-hamburgers/hamburgers.min.css')?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/animsition/css/animsition.min.css') ?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/select2/select2.min.css'); ?>">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/daterangepicker/daterangepicker.css') ?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/slick/slick.css')?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/MagnificPopup/magnific-popup.css')?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/perfect-scrollbar/perfect-scrollbar.css')?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/util.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css')?>">
<!--===============================================================================================-->
</head>

<body class="animsition">
    
    <!-- Header -->
    <header class="header-v4">
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <!-- Topbar -->
            <div class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                        Free shipping for standard order over Rs.1500
                    </div>
                </div>
            </div>

            <div class="wrap-menu-desktop how-shadow1">
                <nav class="limiter-menu-desktop container">
                    
                    <!-- Logo desktop -->       
                    <a href="#" class="logo">
                        <img src="<?php echo base_url('assets/images/icons/logo-01.png')?>" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li>
                                <a href="<?php echo base_url().'product'?>">Home</a>
                            </li>

                            <li class="active-menu">
                                <a href="<?php echo base_url().'product'?>">Shop</a>
                            </li>
                        </ul>
                    </div>  

                    <!-- Icon header 
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <a href="<?php echo base_url().'product/checkout'?>">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="<?php echo $count;?>" id="total-items">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                        </a>
                    </div>-->
                </nav>
            </div>  
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->        
            <div class="logo-mobile">
                <a href="index.html"><img src="<?php echo base_url('assets/images/icons/logo-01.png')?>" alt="IMG-LOGO"></a>
            </div>

            <!-- Icon header
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <a href="<?php //echo base_url().'product/checkout'?>">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="<?php //echo $count;?>">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>
                </a>
            </div>-->

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">
                <li>
                    <div class="left-top-bar">
                        Free shipping for standard order over $100
                    </div>
                </li>
            </ul>

            <ul class="main-menu-m">
                <li>
                    <a href="<?php echo base_url().'product'?>">Home</a>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>

                <li>
                    <a href="<?php echo base_url().'product'?> " >Shop</a>
                </li>
            </ul>
        </div>
    </header>
