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
                <div class="col-sm-12 text-center">
                    <ul class="seremon-list">
                        <?php
                                foreach ($Jadwal as $data) {;?>
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
                </div>
            </div>
        </div>
    </div>
</main>