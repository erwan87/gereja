<div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
	<img class="animation__wobble" src="<?= base_url('assets');?>/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('login/logout');?>" role="button"> Logout</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <!-- <img src="<?= base_url('assets');?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
            <span class="brand-text font-weight-light"><b><?= $settings[0]['nama_aplikasi'] ;?></b></span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item <?php if($this->uri->segment('1')==='dashboard' && $this->uri->segment('2')== ''){
						$menuopen	= 'menu-open';
						$active		= 'active';
					}else{
						$menuopen	= '';
						$active		= '';
					}
					echo $menuopen;?>">
                        <a href="<?= base_url('dashboard');?>" class="nav-link <?= $active;?>">
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item <?php if($this->uri->segment('1')==='master'){
						$menuopen	= 'menu-open';
						$active		= 'active';
					}else{
						$menuopen	= '';
						$active		= '';
					}
					echo $menuopen;?>">
                        <a href="#" class="nav-link <?= $active;?>">
                            <i class="nav-icon fa fa-database"></i>
                            <p>
                                Master Data
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item <?php
						if($this->uri->segment('1')=='master'){
							echo 'menu-open';
						}
						;?>">
                                <a href="<?= base_url('master/pendeta');?>" class="nav-link <?php
							if($this->uri->segment('2')==='pendeta') {
								echo 'active';
							}
							;?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Pendeta</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('master/jemaat');?>" class="nav-link <?php
							if($this->uri->segment('2')==='jemaat' || $this->uri->segment('2')==='addJemaat' || $this->uri->segment('2')==='editJemaat') {
								echo 'active';
							}
							;?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Jemaat</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('master/keluarga');?>" class="nav-link <?php
							if(
                                $this->uri->segment('2')==='keluarga' || 
                                $this->uri->segment('2')==='addKeluarga' || 
                                $this->uri->segment('2')==='editKeluarga' || 
                                $this->uri->segment('2')==='detKeluarga' || 
                                $this->uri->segment('2')==='addKeluargaKK' || 
                                $this->uri->segment('2')==='editDetKeluarga') {
								echo 'active';
							}
							;?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Keluarga</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('master/lingkungan');?>" class="nav-link <?php
							if($this->uri->segment('2')==='lingkungan') {
								echo 'active';
							}
							;?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Lingkungan</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('master/Majelis');?>" class="nav-link <?php
							if($this->uri->segment('2')==='Majelis') {
								echo 'active';
							}
							;?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Majelis</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('master/wilayah');?>" class="nav-link <?php
							if($this->uri->segment('2')==='wilayah') {
								echo 'active';
							}
							;?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Wilayah</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('master/user');?>" class="nav-link <?php
							if($this->uri->segment('2')==='user' ||$this->uri->segment('2')==='addUser') {
								echo 'active';
							}
							;?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('master/jenisPersembahan');?>" class="nav-link <?php
							if($this->uri->segment('2')==='jenisPersembahan' || $this->uri->segment('2')==='addjenisPersembahan' || $this->uri->segment('2')==='editJenisPersembahan') {
								echo 'active';
							}
							;?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Jenis Persembahan</p>
                                </a>
                            </li>

                            <li class="nav-item <?php if(
                                $this->uri->segment('1')==='master' && ($this->uri->segment('2')==='MainAkun') ||
                                $this->uri->segment('1')==='master' && ($this->uri->segment('2')==='addMainAkun') ||
                                $this->uri->segment('1')==='master' && ($this->uri->segment('2')==='editMainAkun') ||
                                $this->uri->segment('1')==='master' && ($this->uri->segment('2')==='Akun') ||
                                $this->uri->segment('1')==='master' && ($this->uri->segment('2')==='addAkun') ||
                                $this->uri->segment('1')==='master' && ($this->uri->segment('2')==='editAkun') ||
                                $this->uri->segment('1')==='master' && ($this->uri->segment('2')==='SubAkun') ||
                                $this->uri->segment('1')==='master' && ($this->uri->segment('2')==='addSubAkun') ||
                                $this->uri->segment('1')==='master' && ($this->uri->segment('2')==='editSubAkun')
                                ){
						$menuopen	= 'menu-open';
						$active		= 'active';
					}else{
						$menuopen	= '';
						$active		= '';
					}
					echo $menuopen;?>">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-dollar-sign nav-icon"></i>
                                    <p>
                                        Akun Keuangan
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item ">
                                        <a href="<?= base_url('master/MainAkun');?>" class="nav-link <?php
							if($this->uri->segment('2')==='MainAkun' || $this->uri->segment('2')==='addMainAkun' || $this->uri->segment('2')==='editMainAkun') {
								echo 'active';
							}
							;?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Main Akun</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?= base_url('master/Akun');?>" class="nav-link <?php
							if($this->uri->segment('2')==='Akun' || $this->uri->segment('2')==='addAkun' || $this->uri->segment('2')==='editAkun') {
								echo 'active';
							}
							;?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Akun</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?= base_url('master/SubAkun');?>"
                                            class="nav-link <?= base_url('master/Akun');?>" class="nav-link <?php
							if($this->uri->segment('2')==='SubAkun') {
								echo 'active';
							}
							;?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Sub Akun</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="nav-item <?php if($this->uri->segment('2')==='Persembahan' || $this->uri->segment('2')==='addPersembahan' || $this->uri->segment('2')==='editPersembahan'){
						$menuopen	= 'menu-open';
						$active		= 'active';
					}else{
						$menuopen	= '';
						$active		= '';
					}
					echo $menuopen;?>">
                        <a href="<?= base_url('dashboard/Persembahan');?>" class="nav-link <?= $active;?>">
                            <i class="nav-icon fa fa-user-circle"></i>
                            <p>
                                Persembahan
                            </p>
                        </a>
                    </li> -->
                    <li class="nav-item <?php if($this->uri->segment('1')==='Keuangan'){
						$menuopen	= 'menu-open';
						$active		= 'active';
					}else{
						$menuopen	= '';
						$active		= '';
					}
					echo $menuopen;?>">
                        <a href="" class="nav-link <?= $active;?>">
                            <i class="nav-icon fas fa-dollar-sign"></i>
                            <p>
                                Laporan Keuangan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item <?php
						if($this->uri->segment('1')=='Kegiatan'){
							echo 'menu-open';
						}
						;?>">
                                <a href="<?= base_url('Keuangan/Pemasukan');?>" class="nav-link <?php
							if(($this->uri->segment('1')==='Keuangan' && $this->uri->segment('2')===null) || $this->uri->segment('2')==='Pemasukan' || $this->uri->segment('2')==='addPemasukan'|| $this->uri->segment('2')==='editPemasukan' || $this->uri->segment('2')==='ReportPemasukan') {
								echo 'active';
							}else{
								echo '';
							}
							;?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Penerimaan</p>
                                </a>
                            </li>

                            <li class="nav-item <?php
						if($this->uri->segment('1')=='Keuangan'){
							echo 'menu-open';
						}
						;?>">
                                <a href="<?= base_url('Keuangan/Pengeluaran');?>" class="nav-link <?php
							if(($this->uri->segment('1')==='Keuangan' && $this->uri->segment('2') ==='Pengeluaran') || $this->uri->segment('2')==='addPengeluaran'|| $this->uri->segment('2')==='editPengeluaran' || $this->uri->segment('2')==='deleteWarta') {
								echo 'active';
							}else{
								echo '';
							}
							;?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pengeluaran</p>
                                </a>
                            </li>

                            <li class="nav-item <?php
						if($this->uri->segment('1')=='Keuangan'){
							echo 'menu-open';
						}
						;?>">
                                <a href="<?= base_url('Keuangan/LaporanKeuangan');?>" class="nav-link <?php
							if(($this->uri->segment('1')==='Keuangan' && $this->uri->segment('2') ==='LaporanKeuangan')) {
								echo 'active';
							}else{
								echo '';
							}
							;?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan Keuangan</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item <?php if($this->uri->segment('1')==='Warta'){
						$menuopen	= 'menu-open';
						$active		= 'active';
					}else{
						$menuopen	= '';
						$active		= '';
					}
					echo $menuopen;?>">
                        <a href="" class="nav-link <?= $active;?>">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Warta
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item <?php
						if($this->uri->segment('1')=='Kegiatan'){
							echo 'menu-open';
						}
						;?>">
                                <a href="<?= base_url('Warta');?>" class="nav-link <?php
							if(($this->uri->segment('1')==='Warta' && $this->uri->segment('2')===null) || $this->uri->segment('2')==='addWarta'|| $this->uri->segment('2')==='editWarta' || $this->uri->segment('2')==='deleteWarta') {
								echo 'active';
							}else{
								echo '';
							}
							;?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Buat Warta</p>
                                </a>
                            </li>
                            <li class="nav-item <?php
						if($this->uri->segment('1')=='Kegiatan'){
							echo 'menu-open';
						}
						;?>">
                                <a href="<?= base_url('Warta/Majalah');?>" class="nav-link <?php
							if(($this->uri->segment('1')==='Warta' && $this->uri->segment('2') ==='Majalah') || $this->uri->segment('2')==='addWarta'|| $this->uri->segment('2')==='editWarta' || $this->uri->segment('2')==='deleteWarta') {
								echo 'active';
							}else{
								echo '';
							}
							;?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Buat Majalah</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item <?php if($this->uri->segment('1')==='Kegiatan'){
						$menuopen	= 'menu-open';
						$active		= 'active';
					}else{
						$menuopen	= '';
						$active		= '';
					}
					echo $menuopen;?>">
                        <a href="" class="nav-link <?= $active;?>">
                            <i class="nav-icon fa fa-check"></i>
                            <p>
                                Kegiatan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item <?php
						if($this->uri->segment('1')=='Kegiatan'){
							echo 'menu-open';
						}
						;?>">
                                <a href="<?= base_url('Kegiatan/misa');?>" class="nav-link <?php
							if($this->uri->segment('2')==='misa' || $this->uri->segment('2')==='addTglMisa'|| $this->uri->segment('2')==='editTanggalMisa' || $this->uri->segment('2')==='detailMisa' || $this->uri->segment('2')==='editDetailJadwal') {
								echo 'active';
							}else{
								echo '';
							}
							;?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jadwal Ibadah</p>
                                </a>
                            </li>

                            <li class="nav-item <?php
						if($this->uri->segment('1')=='Kegiatan'){
							echo 'menu-open';
						}
						;?>">
                                <a href="<?= base_url('Kegiatan/lingkungan');?>" class="nav-link <?php
							if($this->uri->segment('2')==='lingkungan' || $this->uri->segment('2')==='addKegiatanLingkungan' || $this->uri->segment('2')==='editKegiatanLingkungan') {
								echo 'active';
							}else{
								echo '';
							}
							;?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kegiatan Lingkungan</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <!-- <h1 class="m-0">Dashboard v2</h1> -->
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#"><?= $breadcumb ;?></a></li>
                            <?php
							if($subbreadcumb ==NULL || $subbreadcumb == ''){
								;?>
                            <?php }else{ ;?>
                            <li class="breadcrumb-item active"><?= $subbreadcumb ;?></li>
                            <?php }
						;?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->