<main class="main-content">
    <div class="fullwidth-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>
                        Daftar Pendeta Di <?= $settings[0]['nama_aplikasi'] ;?>
                    </h2>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-2">
                            No.
                        </div>
                        <div class="col-sm-10">
                            Nama Pendeta
                        </div>
                    </div>
                    <?php
                    $no = 1;
                    foreach ($pendeta as $data) {;?>
                    <div class="row">
                        <div class="col-sm-2">
                            <?= $no++ ;?>
                        </div>
                        <div class="col-sm-10">
                            <?= $data['nama_pendeta'] ;?>
                        </div>
                    </div>
                    <?php }
                    ;?>
                </div>
            </div>
        </div>
    </div>
</main>