        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Jenis Persembahan</h3>
                            </div>
                            <?= form_open_multipart('master/actioneditJenisPersembahan/'.$editJenis[0]['id_jenis_persembahan']);?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Jenis Persembahan</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Masukkan Nama Jenis Persembahan ...."
                                        value="<?= $editJenis[0]['nama_jenis_persembahan'];?>">
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