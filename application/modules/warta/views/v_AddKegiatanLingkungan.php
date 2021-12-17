        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?= $subbreadcumb ;?></h3>
                            </div>
                            <?= form_open_multipart('Kegiatan/actionAddKegiatanLingkungan');?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tgl_kegiatan">Tanggal Kegiatan</label>
                                    <input type="text" class="form-control tgl_misa" id="tgl_kegiatan"
                                        name="tgl_kegiatan" placeholder="Enter Tanggal Kegiatan ...." autocomplete="off"
                                        autofocus required>
                                </div>

                                <div class="form-group">
                                    <label for="lingkungan">Lingkungan</label>
                                    <select class="form-control" name="lingkungan" id="lingkungan">
                                        <option value="">-- Silahkan Pilih Lingkungan--</option>
                                        <?php
                                                foreach ($lingkungan as $row) {;?>
                                        <option value="<?=$row['id_lingkungan'];?>"><?= $row['nama_lingkungan'] ;?>
                                        </option>
                                        <?php }
                                                ;?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tempat">Tempat PKS</label>
                                    <select class="form-control" name="tempat" id="tempat">
                                        <option value="">-- Silahkan Pilih Tempat PKS--</option>
                                        <?php
                                                foreach ($jemaat as $row) {;?>
                                        <option value="<?=$row['id_jemaat'];?>"><?= $row['nama_jemaat'] ;?>
                                        </option>
                                        <?php }
                                                ;?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="penanggungJawab">Penanggung Jawab</label>
                                    <select class="form-control" name="penanggungJawab" id="penanggungJawab">
                                        <option value="">-- Silahkan Pilih Penanggung Jawab--</option>
                                        <?php
                                                foreach ($jemaat as $row) {;?>
                                        <option value="<?=$row['id_jemaat'];?>"><?= $row['nama_jemaat'] ;?>
                                        </option>
                                        <?php }
                                                ;?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="wilayah">Wilayah</label>
                                    <select class="form-control" name="wilayah" id="wilayah">
                                        <option value="">-- Silahkan Pilih Wilayah--</option>
                                        <?php
                                                foreach ($wilayah as $row) {;?>
                                        <option value="<?=$row['id_wilayah'];?>"><?= $row['nama_wilayah'] ;?>
                                        </option>
                                        <?php }
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