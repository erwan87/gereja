        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center text-uppercase bg-info">
                            <h5>
                                <b><?= $subbreadcumb ;?> Hari :
                                    <?= getConvertHari(date('l', strtotime($detMisa[0]['tgl_misa']))) ;?>
                                    , <?= tgl_indo($detMisa[0]['tgl_misa']) ;?> Pukul :
                                    <?= date('H:i', strtotime($detMisa[0]['tgl_misa']));?>
                                    <div class="text-danger">
                                        <?= getWaktu(date('H:i', strtotime($detMisa[0]['tgl_misa']))) ;?></div>
                                </b>
                            </h5>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('Kegiatan/editDetailJadwal/'.$detMisa[0]['id_jadwal']);?>"
                    class="btn btn-info btn-sm"> <i class="fa fa-check-circle"></i> Edit</a>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responive">
                                    <table id="tableJemaat" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>Pujian Pembukaan</td>
                                                <td><?= $detMisa[0]['pembuka'] ;?></td>
                                                <td>Petunjuk Hidup Baru</td>
                                                <td><?= $detMisa[0]['petunjuk'] ;?></td>
                                            </tr>

                                            <tr>
                                                <td>Nats Pembimbing</td>
                                                <td><?= $detMisa[0]['nats'] ;?></td>
                                                <td>Pujian</td>
                                                <td><?= $detMisa[0]['pujian2'] ;?></td>
                                            </tr>

                                            <tr>
                                                <td>Pujian</td>
                                                <td><?= $detMisa[0]['pujian'] ;?></td>
                                                <td>Nats Renungan</td>
                                                <td><?= $detMisa[0]['renungan'] ;?></td>
                                            </tr>

                                            <tr>
                                                <td>Pengakuan Dosa</td>
                                                <td><?= $detMisa[0]['pengakuan'] ;?></td>
                                                <td>Nats Persembahan</td>
                                                <td><?= $detMisa[0]['persembahan'] ;?></td>
                                            </tr>

                                            <tr>
                                                <td>Berita Anugrah</td>
                                                <td><?= $detMisa[0]['berita'] ;?></td>
                                                <td>Pujian</td>
                                                <td><?= $detMisa[0]['pujian3'] ;?></td>
                                            </tr>

                                            <tr>
                                                <td>Pujian</td>
                                                <td><?= $detMisa[0]['pujian1'] ;?></td>
                                                <td>Pujian Penutup</td>
                                                <td><?= $detMisa[0]['penutup'] ;?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>