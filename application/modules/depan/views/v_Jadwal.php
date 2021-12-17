<main class="main-content">
    <div class="fullwidth-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="section-title">
                        Jadwal Ibadah Di <?= $settings[0]['nama_aplikasi'] ;?>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
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
                </div>
            </div>
        </div>
    </div>
</main>