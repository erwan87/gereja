        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Data Keluarga</h3>
                            </div>
                            <?= form_open_multipart('master/actionAddKeluarga');?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="no_kk">Nomor KK</label>
                                    <input type="text" class="form-control" id="no_kk" name="no_kk"
                                        placeholder="Masukkan Nama Keluarga ...." value="<?=$no_kk;?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="nama_keluarga">Nama Keluarga</label>
                                    <input type="text" class="form-control" id="nama_keluarga" name="nama_keluarga"
                                        placeholder="Masukkan Nama Keluarga ...." autofocus required>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="Masukkan Alamat Keluarga ...." required>
                                </div>

                                <div class="form-group">
                                    <label for="no_telp">Nomor Telephone</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp"
                                        placeholder="Masukkan Nomor Telepon Keluarga ...." required>
                                </div>

                                <div class="form-group">
                                    <label for="lingkungan">Lingkungan</label>
                                    <select class="form-control" name="lingkungan" id="lingkungan">
                                        <option value="">-- Silahkan Pilih Lingkungan--</option>
                                        <?php
                                                    foreach ($lingkungan as $row) {;?>
                                        <option value=" <?=$row['id_lingkungan'];?>"><?= $row['nama_lingkungan'] ;?>
                                        </option>
                                        <?php }
                                                    ;?>
                                    </select>
                                </div>
                                

                                <div class="form-group">
                                    <label for="wilayah">Wilayah</label>
                                    <select class="form-control" name="wilayah" id="wilayah">
                                        <option value="">-- Silahkan Pilih Wilayah--</option>
                                        <?php
                                                    foreach ($wilayah as $row) {;?>
                                        <option value="<?=$row['id_wilayah'];?>"><?= $row['nama_wilayah'] ;?>
                                        </option>
                                        <?php }
                                                    ;?>
                                    </select>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <?= form_close() ;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
        </div>