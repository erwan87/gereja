<div class="hero">
    <div class="slides">
        <li data-bg-image="<?= base_url('assets');?>/images/slide-1.jpg">
            <div class="container">
                <div class="slide-content">
                    <small class="slide-subtitle"><?= $settings[0]['nama_aplikasi'] ;?></small>
                </div>
            </div>
        </li>

        <li data-bg-image="<?= base_url('assets');?>/images/slide-1.jpg">
            <div class="container">
                <div class="slide-content">
                    <small class="slide-subtitle"><?= $settings[0]['nama_aplikasi'] ;?></small>
                </div>
            </div>
        </li>
    </div>
</div>
<main class="main-content">
    <div class="fullwidth-block">
        <div class="container">
            <!-- Cek Event Misa -->

            <div class="row">
                <div class="col-md-6">
                    <h2 class="section-title">Jadwal Ibadah</h2>
                    <ul class="event-list">
                        <?php
                                foreach ($Jadwal as $show) {;?>
                        <li>
                            <a href="<?= base_url('Depan/detailJadwal/'.$show['id_jadwal']);?>">
                                <h3 class="event-title"><b><?= $show['nama_pendeta'] ;?></b></h3>
                                <span class="event-meta">
                                    <span><i class="fa fa-calendar"></i><?= tgl_indo($show['tgl_misa']) ;?></span>
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
                            <img src="<?= base_url('assets');?>/images/icon.png" alt="icon.png" style="width:50px;">
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