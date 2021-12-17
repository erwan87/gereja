        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?= $subbreadcumb ;?></h3>
                            </div>
                            <?= form_open_multipart('Kegiatan/actionEditKegiatanLingkungan/'.$kegiatanLingk[0]['id_kegiatan_lingkungan']);?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tgl_kegiatan">Tanggal Kegiatan</label>
                                    <input type="text" class="form-control tgl_misa" id="tgl_kegiatan"
                                        name="tgl_kegiatan" placeholder="Enter Tanggal Kegiatan ...." autocomplete="off"
                                        value="<?= tgl_indo($kegiatanLingk[0]['tgl_kegiatan']);?>">
                                </div>

                                <div class="form-group">
                                    <label for="lingkungan">Lingkungan</label>
                                    <select class="form-control" name="lingkungan" id="lingkungan">
                                        <?php
                                        foreach ($lingkungan as $row) {
                                            if ($kegiatanLingk[0]['id_lingkungan']==$row['id_lingkungan']) {
                                                $selected	= 'SELECTED';
                                            } else {
                                                $selected	= '';
                                            }; ?>
                                        <option value="<?= $row['id_lingkungan']; ?>" <?= $selected ; ?>>
                                            <?= $row['nama_lingkungan']; ?></option>
                                        <?php
                                        }
                                        ;?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tempat">Tempat PKS</label>
                                    <select class="form-control" name="tempat" id="tempat">
                                        <?php
                                        foreach ($jemaat as $row) {
                                            if ($kegiatanLingk[0]['tempat']==$row['id_jemaat']) {
                                                $selected	= 'SELECTED';
                                            } else {
                                                $selected	= '';
                                            }; ?>
                                        <option value="<?= $row['id_jemaat']; ?>" <?= $selected ; ?>>
                                            <?= $row['nama_jemaat']; ?></option>
                                        <?php
                                        }
                                        ;?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="penanggungJawab">Penanggung Jawab</label>
                                    <select class="form-control" name="penanggungJawab" id="penanggungJawab">
                                        <option value="">-- Silahkan Pilih Penanggung Jawab--</option>
                                        <?php
                                        foreach ($jemaat as $row) {
                                            if ($kegiatanLingk[0]['penanggungjawab']==$row['id_jemaat']) {
                                                $selected	= 'SELECTED';
                                            } else {
                                                $selected	= '';
                                            }; ?>
                                        <option value="<?= $row['id_jemaat']; ?>" <?= $selected ; ?>>
                                            <?= $row['nama_jemaat']; ?></option>
                                        <?php
                                        }
                                        ;?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="wilayah">Wilayah</label>
                                    <select class="form-control" name="wilayah" id="wilayah">
                                        <?php
                                        foreach ($wilayah as $row) {
                                            if ($kegiatanLingk[0]['wilayah']==$row['id_wilayah']) {
                                                $selected	= 'SELECTED';
                                            } else {
                                                $selected	= '';
                                            }; ?>
                                        <option value="<?= $row['id_wilayah']; ?>" <?= $selected ; ?>>
                                            <?= $row['nama_wilayah']; ?></option>
                                        <?php
                                        }
                                        ;?>
                                    </select>
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