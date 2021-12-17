        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Data Lingkungan</h3>
                            </div>
                            <?= form_open_multipart('master/actionEditLingkungan/'.$editLingkungan[0]['id_lingkungan']);?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_lingkunganEdit">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_lingkunganEdit" name="nama_lingkunganEdit" placeholder="Enter Wilayah Name ...." value="<?= $editLingkungan[0]['nama_lingkungan'];?>" required>
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