        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Data Tanggal Ibadah</h3>
                            </div>
                            <?= form_open_multipart('Kegiatan/actionEditTanggalMisa/'.$TglMisa[0]['id_jadwal']);?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tgl_misa">Tanggal Ibadah</label>
                                    <input type="text" class="form-control tgl_misa" id="tgl_misa" name="tgl_misa"
                                        placeholder="Enter Tanggal Misa ...."
                                        value="<?= tgl_indo($TglMisa[0]['tgl_misa']);?>">
                                </div>

                                <div class="form-group">
                                    <label for="jam">Jam Ibadah</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="jam" name="jam" maxlength="2"
                                            placeholder="Contoh : 03"
                                            value="<?= date('h',strtotime($TglMisa[0]['tgl_misa']));?>">
                                        <input type="text" class="form-control" id="jam1" name="jam1" maxlength="2"
                                            placeholder="Contoh : 30"
                                            value="<?= date('i',strtotime($TglMisa[0]['tgl_misa']));?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pendeta">Pendeta</label>
                                    <select class="form-control" name="pendeta" id="pendeta">
                                        <?php
                                                foreach ($pendeta as $row) {
                                                    if ($TglMisa[0]['id_pendeta']==$row['id_pendeta']) {
                                                        $selected	= 'SELECTED';
                                                    } else {
                                                        $selected	= '';
                                                    }; ?>
                                        <option value="<?= $row['id_pendeta']; ?>" <?= $selected ; ?>>
                                            <?= $row['nama_pendeta']; ?></option>
                                        <?php
                                            }
                                            ;?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="pembuka">Pujiaan Pembukaan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="pembuka" name="pembuka"
                                            placeholder="Masukan Pujian Pembukaan"
                                            value="<?= $TglMisa[0]['pembuka'];?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nats">Nats Pembimbing</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nats" name="nats"
                                            placeholder="Masukan Pujian Nats Pembimbing"
                                            value="<?= $TglMisa[0]['nats'];?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pujian">Pujian</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="pujian" name="pujian"
                                            placeholder="Masukan Pujian " value="<?= $TglMisa[0]['pujian'];?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pengakuan">Pengakuan Dosa</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="pengakuan" name="pengakuan"
                                            placeholder="Masukan Pujian Pengakuan Dosa"
                                            value="<?= $TglMisa[0]['pengakuan'];?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="berita">Berita Anugrah</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="berita" name="berita"
                                            placeholder="Masukan Bacaan Berita Anugrah"
                                            value="<?= $TglMisa[0]['berita'];?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pujian1">Pujian</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="pujian1" name="pujian1"
                                            placeholder="Masukan Pujian" value="<?= $TglMisa[0]['pujian1'];?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="petunjuk">Petunjuk Hidup Baru</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="petunjuk" name="petunjuk"
                                            placeholder="Masukan Pujian Petunjuk Hidup Baru"
                                            value="<?= $TglMisa[0]['petunjuk'];?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pujian2">Pujian</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="pujian2" name="pujian2"
                                            placeholder="Masukan Pujian" value="<?= $TglMisa[0]['pujian2'];?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="renungan">Nats Renungan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="renungan" name="renungan"
                                            placeholder="Masukan Pujian Nats Renungan"
                                            value="<?= $TglMisa[0]['renungan'];?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="persembahan">Nats Persembahan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="persembahan" name="persembahan"
                                            placeholder="Masukan Pujian Nats Persembahan"
                                            value="<?= $TglMisa[0]['persembahan'];?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pujian3">Pujian</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="pujian3" name="pujian3"
                                            placeholder="Masukan Pujian" value="<?= $TglMisa[0]['pujian3'];?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="penutup">Pujian Penutup</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="penutup" name="penutup"
                                            placeholder="Masukan Pujian Penutup" value="<?= $TglMisa[0]['penutup'];?>">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <?= form_close() ;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
        </div>
        <script>
$(function() {
    $(".tgl_misa").datepicker({
        format: "dd MM yyyy",
        autoclose: true,
        todayHighlight: true,
    });
});
        </script>