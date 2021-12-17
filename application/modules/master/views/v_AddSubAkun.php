        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Data Sub Akun</h3>
                            </div>
                            <?= form_open_multipart('master/actionAddSubAkun');?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="MainAkun">Nama Main Akun</label>
                                    <select class="form-control" id="MainAkun" name="MainAkun">
                                        <?php
                                        foreach ($MainAkun as $data) {;?>
                                        <option value="<?= $data['id_main_akun'];?>"><?= $data['nama_main_akun'];?>
                                        </option>
                                        <?php }
                                        ;?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="Akun">Nama Akun</label>
                                    <select class="form-control" id="Akun" name="Akun">
                                        <?php
                                        foreach ($Akun as $data) {;?>
                                        <option value="<?= $data['id_akun'];?>"><?= $data['nama_akun'];?>
                                        </option>
                                        <?php }
                                        ;?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="SubAkun">Nama Sub Akun</label>
                                    <input type="text" class="form-control" id="SubAkun" name="SubAkun"
                                        placeholder="Enter Sub Akun Name ...." autofocus required>
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