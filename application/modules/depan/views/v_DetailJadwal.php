<main class="main-content">
    <div class="fullwidth-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="section-title">
                        Jadwal Ibada Hari <?= getConvertHari(date('l', strtotime($Jadwal[0]['tgl_misa']))) ;?>
                        <br> Tanggal : <?= tgl_indo($Jadwal[0]['tgl_misa']) ;?> Pukul :
                        <?= date('H:i', strtotime($Jadwal[0]['tgl_misa']));?>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-4">
                            Pendeta
                        </div>
                        <div class="col-sm-6">
                            <?= $Jadwal[0]['nama_pendeta'] ;?>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-2">
                            Pujian Pembuka
                        </div>
                        <div class="col-sm-2">
                            <?= $Jadwal[0]['pembuka'] ;?>
                        </div>
                        <div class="col-sm-2">
                            Petunjuk Hidup Baru
                        </div>
                        <div class="col-sm-2">
                            <?= $Jadwal[0]['petunjuk'] ;?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-2">
                            Nats Pembimbing
                        </div>
                        <div class="col-sm-2">
                            <?= $Jadwal[0]['nats'] ;?>
                        </div>
                        <div class="col-sm-2">
                            Pujian
                        </div>
                        <div class="col-sm-2">
                            <?= $Jadwal[0]['pujian2'] ;?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-2">
                            Pujian
                        </div>
                        <div class="col-sm-2">
                            <?= $Jadwal[0]['pujian'] ;?>
                        </div>
                        <div class="col-sm-2">
                            Nats Renungan
                        </div>
                        <div class="col-sm-2">
                            <?= $Jadwal[0]['renungan'] ;?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-2">
                            Pengakuan Dosa
                        </div>
                        <div class="col-sm-2">
                            <?= $Jadwal[0]['pengakuan'] ;?>
                        </div>
                        <div class="col-sm-2">
                            Nats Persembahan
                        </div>
                        <div class="col-sm-2">
                            <?= $Jadwal[0]['persembahan'] ;?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-2">
                            Berita Anugra
                        </div>
                        <div class="col-sm-2">
                            <?= $Jadwal[0]['berita'] ;?>
                        </div>
                        <div class="col-sm-2">
                            Pujian
                        </div>
                        <div class="col-sm-2">
                            <?= $Jadwal[0]['pujian3'] ;?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-2">
                            Pujian
                        </div>
                        <div class="col-sm-2">
                            <?= $Jadwal[0]['pujian1'] ;?>
                        </div>
                        <div class="col-sm-2">
                            Pujian Penutup
                        </div>
                        <div class="col-sm-2">
                            <?= $Jadwal[0]['penutup'] ;?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>