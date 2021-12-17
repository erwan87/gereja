<main class="main-content">
    <div class="fullwidth-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="section-title">
                        Warta Gereja
                    </h2>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-2">
                            No.
                        </div>
                        <div class="col-sm-5">
                            Majalah Warta
                        </div>
                        <div class="col-sm-5">
                            Tanggal Terbit
                        </div>
                    </div>
                    <?php
                    $no = 1;
                    foreach ($warta as $data) {;?>
                    <div class="row">
                        <div class="col-sm-2">
                            <?= $no++ ;?>
                        </div>
                        <div class="col-sm-5">
                            <a href="<?= base_url('Depan/DownloadPDf/'.$data['id_warta_majalah']);?>"
                                alt="<?= $data['nama_file'] ;?>" target="_blank">
                                <?= $data['nama_file'] ;?>
                            </a>
                        </div>
                        <div class="col-sm-5">
                            <?= tgl_indo($data['tgl_terbit']) ;?>
                        </div>
                    </div>
                    <?php }
                    ;?>
                </div>
            </div>
        </div>
    </div>
</main>