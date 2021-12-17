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
                                            <?= form_open_multipart('Kegiatan/actioneditDetailJadwal/'.$detMisa[0]['id_jadwal']);?>
                                            <tr>
                                                <td>Pujian Pembukaan</td>
                                                <td>
                                                    <input type="text" class="form-control" id="pembuka" name="pembuka"
                                                        value="<?= $detMisa[0]['pembuka'] ;?>">
                                                </td>
                                                <td>Petunjuk Hidup Baru</td>
                                                <td>
                                                    <input type="text" class="form-control" id="petunjuk"
                                                        name="petunjuk" value="<?= $detMisa[0]['petunjuk'] ;?>">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Nats Pembimbing</td>
                                                <td>
                                                    <input type="text" class="form-control" id="nats" name="nats"
                                                        value="<?= $detMisa[0]['nats'] ;?>">
                                                </td>
                                                <td>Pujian</td>
                                                <td>
                                                    <input type="text" class="form-control" id="pujian2" name="pujian2"
                                                        value="<?= $detMisa[0]['pujian2'] ;?>">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Pujian</td>
                                                <td>
                                                    <input type="text" class="form-control" id="pujian" name="pujian"
                                                        value="<?= $detMisa[0]['pujian'] ;?>">
                                                </td>
                                                <td>Nats Renungan</td>
                                                <td>
                                                    <input type="text" class="form-control" id="renungan"
                                                        name="renungan" value="<?= $detMisa[0]['renungan'] ;?>">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Pengakuan Dosa</td>
                                                <td>
                                                    <input type="text" class="form-control" id="pengakuan"
                                                        name="pengakuan" value="<?= $detMisa[0]['pengakuan'] ;?>">
                                                </td>
                                                <td>Nats Persembahan</td>
                                                <td>
                                                    <input type="text" class="form-control" id="persembahan"
                                                        name="persembahan" value="<?= $detMisa[0]['persembahan'] ;?>">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Berita Anugrah</td>
                                                <td>
                                                    <input type="text" class="form-control" id="berita" name="berita"
                                                        value="<?= $detMisa[0]['berita'] ;?>">
                                                </td>
                                                <td>Pujian</td>
                                                <td>
                                                    <input type="text" class="form-control" id="pujian3" name="pujian3"
                                                        value="<?= $detMisa[0]['pujian3'] ;?>">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Pujian</td>
                                                <td>
                                                    <input type="text" class="form-control" id="pujian1" name="pujian1"
                                                        value="<?= $detMisa[0]['pujian1'] ;?>">
                                                </td>
                                                <td>Pujian Penutup</td>
                                                <td>
                                                    <input type="text" class="form-control" id="penutup" name="penutup"
                                                        value="<?= $detMisa[0]['penutup'] ;?>">
                                                </td>
                                            </tr>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="cancel" class="btn btn-info">Cancel</button>
                                            <?php form_close() ;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>