<?php
defined('BASEPATH') or exit('No direct script access allowed');
;?>
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
                <li
                    class="menu-item <?php if($this->uri->segment('1')=='Depan' && $this->uri->segment('2') == ''){$active = 'current-menu-item';}else{$active='';};echo $active;?>">
                    <a href="<?= base_url('Depan');?>">Homepage</a>
                </li>
                <li
                    class="menu-item <?php if($this->uri->segment('2')=='pendeta'){echo 'current-menu-item';}else{echo '';};?>">
                    <a href="<?= base_url('Depan/pendeta');?>">Pendeta</a>
                </li>
                <li class="menu-item"><a href="<?= base_url('Depan/WartaGereja');?>">Warta Gereja</a>
                </li>
                <li
                    class="menu-item <?php if($this->uri->segment('2')=='Contact'){echo 'current-menu-item';}else{echo '';};?>">
                    <a href="<?= base_url('Depan/Contact');?>">Contact</a>
                </li>
            </ul>
        </div>

        <div class="mobile-navigation"></div>
    </div>
</header>