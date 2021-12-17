        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?= $subbreadcumb ;?></h3>
                            </div>
                            <?= form_open_multipart('dashboard/actionEditPersembahan/'.$persembahan[0]['id_persembahan']);?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Jemaat</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Nama Pemberi Persembahan ...."
                                        value="<?= $persembahan[0]['nama_jemaat'];?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="jenis_persembahan">Jenis Persembahan</label>
                                    <select class="form-control" name="jenis_persembahan" id="jenis_persembahan">
                                        <option value="">-- Silahkan Pilih Jenis Persembahan--</option>
                                        <?php
                                                foreach ($jenisPersembahan as $row) {
                                                    if ($persembahan[0]['id_jenis_persembahan']==$row['id_jenis_persembahan']) {
                                                        $selected	= 'SELECTED';
                                                    } else {
                                                        $selected	= '';
                                                    }; ?>
                                        <option value="<?= $row['id_jenis_persembahan']; ?>" <?= $selected ; ?>>
                                            <?= $row['nama_jenis_persembahan']; ?></option>
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