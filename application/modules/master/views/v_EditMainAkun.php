        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Data Main Akun</h3>
                            </div>
                            <?= form_open_multipart('master/actionEditMainAkun/'.$MainAkun[0]['id_main_akun']);?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="mainAkun">Nama Main Akun</label>
                                    <input type="text" class="form-control" id="mainAkun" name="mainAkun"
                                        placeholder="Enter Main Akun Name ...."
                                        value="<?= $MainAkun[0]['nama_main_akun'];?>" autofocus required>
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