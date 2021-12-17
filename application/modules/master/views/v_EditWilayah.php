        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Data Wilayah</h3>
                            </div>
                            <?= form_open_multipart('master/actionEditWilayah/'.$editWilayah[0]['id_wilayah']);?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_wilayahEdit">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_wilayahEdit" name="nama_wilayahEdit" placeholder="Enter Wilayah Name ...." value="<?= $editWilayah[0]['nama_wilayah'];?>" required>
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