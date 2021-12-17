<?php
defined('BASEPATH') or exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title><?= $titles ;?></title>

    <!-- Loading third party fonts -->
    <link href="<?= base_url('assets');?>/fonts/novecento-font/novecento-font.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets');?>/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Loading main css file -->
    <link rel="stylesheet" href="<?= base_url('assets');?>/css/style.css">
</head>

<body>
    <div class="site-content">
        <header class="site-header">
            <div class="container">
                <a href="#" class="branding">
                    <img src="<?= base_url('assets');?>/images/<?= $settings[0]['images'] ;?>"
                        alt="<?= $settings[0]['images'] ;?>" class="logo">
                    <h1 class="site-title"><?= $settings[0]['nama_aplikasi'] ;?></h1>
                </a>

                <div class="main-navigation">
                    <button class="menu-toggle"><i class="fa fa-bars"></i> Menu</button>
                    <ul class="menu">
                        <li class="menu-item current-menu-item"><a href="<?= base_url('Depan');?>">Homepage</a></li>
                        <li class="menu-item"><a href="<?= base_url('Depan/pendeta');?>">Pastors</a></li>
                        <li class="menu-item"><a href="<?= base_url('Depan/WartaGereja');?>">Warta Gereja</a>
                        </li>
                        <li class="menu-item"><a href="#">Contact</a></li>
                    </ul>
                </div>

                <div class="mobile-navigation"></div>
            </div>
        </header> <!-- .site-header -->

        <div class="hero">
            <div class="slides">
                <li data-bg-image="<?= base_url('assets');?>/images/slide-1.jpg">
                    <div class="container">
                        <div class="slide-content">
                            <small class="slide-subtitle"><?= $settings[0]['nama_aplikasi'] ;?></small>
                            <!-- <h2 class="slide-title">Place with a real love</h2> -->

                            <!-- <a href="#" class="button">See our families</a> -->
                        </div>
                    </div>
                </li>

                <li data-bg-image="<?= base_url('assets');?>/images/slide-1.jpg">
                    <div class="container">
                        <div class="slide-content">
                            <small class="slide-subtitle"><?= $settings[0]['nama_aplikasi'] ;?></small>
                            <!-- <h2 class="slide-title">Place with a real love</h2> -->

                            <!-- <a href="#" class="button">See our families</a> -->
                        </div>
                    </div>
                </li>
            </div>
        </div>

        <main class="main-content">
            <div class="fullwidth-block">
                <div class="container">
                    <h2 class="section-title">Recent news</h2>

                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="news">
                                <image class="news-image" src="<?= base_url('assets');?>/images/news-thumb-1.jpg">
                                </image>
                                <h3 class="news-title"><a href="#">laboris nisi ut aliquip</a></h3>
                                <small class="date"><i class="fa fa-calendar"></i>24 mar 2014</small>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="news">
                                <image class="news-image" src="<?= base_url('assets');?>/images/news-thumb-2.jpg">
                                </image>
                                <h3 class="news-title"><a href="#">laboris nisi ut aliquip</a></h3>
                                <small class="date"><i class="fa fa-calendar"></i>24 mar 2014</small>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="news">
                                <image class="news-image" src="<?= base_url('assets');?>/images/news-thumb-3.jpg">
                                </image>
                                <h3 class="news-title"><a href="#">laboris nisi ut aliquip</a></h3>
                                <small class="date"><i class="fa fa-calendar"></i>24 mar 2014</small>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="news">
                                <image class="news-image" src="<?= base_url('assets');?>/images/news-thumb-4.jpg">
                                </image>
                                <h3 class="news-title"><a href="#">laboris nisi ut aliquip</a></h3>
                                <small class="date"><i class="fa fa-calendar"></i>24 mar 2014</small>
                            </div>
                        </div>
                    </div> <!-- .row -->
                </div> <!-- .container -->
            </div> <!-- section -->

            <div class="fullwidth-block">
                <div class="container">
                    <!-- Cek Event Ibadah -->

                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="section-title">Jadwal Ibadah</h2>
                            <ul class="event-list">
                                <?php
                                foreach ($Jadwal as $show) {;?>
                                <li>
                                    <a href="#">
                                        <h3 class="event-title"><b><?= $show['nama_pendeta'] ;?></b></h3>
                                        <span class="event-meta">
                                            <span><i
                                                    class="fa fa-calendar"></i><?= tgl_indo($show['tgl_misa']) ;?></span>
                                            <span><i class="fa fa-clock-o"></i>
                                                <?= date('H:i',strtotime($show['tgl_misa'])) ;?></span>
                                        </span>
                                    </a>
                                </li>
                                <?php 
                                    }
                                ;?>
                            </ul>

                            <div class="text-center">
                                <a href="<?= base_url('Depan/JadwalMisa') ;?>" class="button">See all events</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h2 class="section-title">Jadwal Kegiatan Lingkungan</h2>
                            <ul class="seremon-list">
                                <?php
                                foreach ($Lingkungan as $data) {;?>
                                <li>
                                    <img src="<?= base_url('assets');?>/images/icon.png" alt="icon.png"
                                        style="width:50px;">
                                    <div class="seremon-detail">
                                        <h3 class="seremon-title">Kegiatan Lingkungan
                                            <?= $data['nama_lingkungan'] ;?>
                                        </h3>
                                        <div class="seremon-meta">
                                            <div class="pastor"><i class="fa fa-user"></i> <?= $data['nama_jemaat'] ;?>
                                            </div>
                                            <div class="date"><i class="fa fa-calendar"></i>
                                                <?= tgl_indo($data['tgl_kegiatan']) ;?></div>
                                        </div>
                                    </div>
                                </li>
                                <?php }
                                ;?>
                            </ul>

                            <div class="text-center">
                                <a href="<?= base_url('Depan/JadwalLingkungan');?>" class="button">See all seremons</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="widget">
                            <h3 class="widget-title">Our address</h3>
                            <ul class="address">
                                <li><i class="fa fa-map-marker"></i> <?= $settings[0]['alamat'] ;?></li>
                                <li><i class="fa fa-phone"></i> <?= $settings[0]['no_telp'] ;?></li>
                                <li><i class="fa fa-envelope"></i> <?= $settings[0]['email'] ;?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="widget">
                            <h3 class="widget-title">Topics from last meeting</h3>
                            <ul class="bullet">
                                <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                                <li><a href="#">Consectetur adipisicing elit quis nostrud</a></li>
                                <li><a href="#">Eiusmod tempor incididunt ut labore et dolore magna</a></li>
                                <li><a href="#">Ut enim ad minim veniam cillum</a></li>
                                <li><a href="#">Exercitation ullamco laboris nisi ut aliquip</a></li>
                                <li><a href="#">Duis aute irure dolor in reprehenderit in voluptate</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <p class="colophon">Copyright 2014 True Church. All right reserved. Modified By
                    <?= $settings[0]['nama_aplikasi'] ;?> @ 2021</p>
            </div><!-- .container -->
        </footer> <!-- .site-footer -->
    </div>
    <script src="<?= base_url('assets');?>/js/jquery-2.1.4.min.js"></script>
    <script src="<?= base_url('assets');?>/js/plugins.js"></script>
    <script src="<?= base_url('assets');?>/js/app.js"></script>
</body>

</html>