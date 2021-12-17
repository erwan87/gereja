        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Data Jemaat</h3>
                            </div>
                            <?= form_open_multipart('master/actionAddJemaat');?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_jemaat">Nama Jemaat</label>
                                        <input type="text" class="form-control" id="nama_jemaat" name="nama_jemaat" placeholder="Enter Jemaat Name ...." autofocus required>
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
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Enter Tempat Lahir ...." required>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input type="text" class="form-control tglLahir" id="tgl_lahir" name="tgl_lahir" placeholder="Enter Tanggal Lahir ...." required>
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
                                        <label for="jenkel">Jenis Kelamin</label>
                                        <select class="form-control" name="jenkel" id="jenkel">
                                            <option value="">-- Silahkan Pilih Jenis Kelamin--</option>
                                            <option value="Laki - Laki">Laki - Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email ...." required>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="lingkungan">Lingkungan</label>
                                        <select class="form-control" name="lingkungan" id="lingkungan">
                                            <option value="">-- Silahkan Pilih Lingkungan--</option>
                                            <?php
                                            foreach ($lingkungan as $row) {;?>
                                                <option value="<?=$row['id_lingkungan'];?>"><?= $row['nama_lingkungan'] ;?></option>
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
            $(".tglLahir").datepicker({
                format: "dd MM yyyy",
                autoclose: true,
                todayHighlight: true,
            });
        });
    </script>