        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Data Pendeta</h3>
                            </div>
                            <?= form_open_multipart('master/actionEditPendeta/'.$editPendeta[0]['id_pendeta']);?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_pendetaEdit">Nama Pendeta</label>
                                        <input type="text" class="form-control" id="nama_pendetaEdit" name="nama_pendetaEdit" placeholder="Enter Pendeta Name ...." value="<?= $editPendeta[0]['nama_pendeta'];?>" autofocus required>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="alamatEdit">Alamat</label>
                                        <input type="text" class="form-control" id="alamatEdit" name="alamatEdit" placeholder="Enter Alamat ...." value="<?= $editPendeta[0]['alamat'];?>"required>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="no_telpEdit">Nomor Telephone</label>
                                        <input type="text" class="form-control" id="no_telpEdit" name="no_telpEdit" value="<?= $editPendeta[0]['no_telp'];?>"placeholder="Enter Phone Number ...." required>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="emailEdit">Email</label>
                                        <input type="email" class="form-control" id="emailEdit" name="emailEdit" value="<?= $editPendeta[0]['email'];?>"placeholder="Enter Email ...." required>
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