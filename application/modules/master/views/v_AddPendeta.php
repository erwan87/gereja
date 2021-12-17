        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Data Pendeta</h3>
                            </div>
                            <?= form_open_multipart('master/actionAddPendeta');?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_pendeta">Nama Pendeta</label>
                                        <input type="text" class="form-control" id="nama_pendeta" name="nama_pendeta" placeholder="Enter Pendeta Name ...." autofocus required>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Enter Alamat ...." required>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="no_telp">Nomor Telephone</label>
                                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Enter Phone Number ...." required>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email ...." required>
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