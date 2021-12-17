        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Data Wilayah</h3>
                            </div>
                            <?= form_open_multipart('master/actionAddWilayah');?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_wilayah">Nama Wilayah</label>
                                        <input type="text" class="form-control" id="nama_wilayah" name="nama_wilayah" placeholder="Enter Wilayah Name ...." autofocus required>
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