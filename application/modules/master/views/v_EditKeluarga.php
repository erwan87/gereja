        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Data Keluarga</h3>
                            </div>
                            <?= form_open_multipart('master/actionEditKeluarga/'.$keluarga[0]['id_keluarga']);?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_keluarga">Nama Keluarga</label>
                                    <input type="text" class="form-control" id="nama_keluarga" name="nama_keluarga"
                                        placeholder="Masukkan Nama Keluarga ...." value="<?= $keluarga[0]['nama'];?>"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="Masukkan Alamat Keluarga ...."
                                        value="<?= $keluarga[0]['alamat'];?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="no_telp">Nomor Telephone</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp"
                                        placeholder="Masukkan Nomor Telepon Keluarga ...."
                                        value="<?= $keluarga[0]['no_telp'];?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="lingkungan">Lingkungan</label>
                                    <select class="form-control" name="lingkungan" id="lingkungan">
                                        <?php
                                            foreach ($lingkungan as $row) {
                                                if($row['id_lingkungan']===$keluarga[0]['id_lingkungan']){
                                                    $selected       = 'SELECTED';
                                                }else{
                                                    $selected       = '';
                                                };?>
                                        <option value="<?=$row['id_lingkungan'];?>" <?= $selected ;?>>
                                            <?= $row['nama_lingkungan'] ;?></option>
                                        <?php }
                                            ;?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="wilayah">Wilayah</label>
                                    <select class="form-control" name="wilayah" id="wilayah">
                                        <?php
                                            foreach ($wilayah as $row) {
                                                if($row['id_wilayah']===$keluarga[0]['id_wilayah']){
                                                    $selected       = 'SELECTED';
                                                }else{
                                                    $selected       = '';
                                                };?>
                                        <option value="<?=$row['id_wilayah'];?>" <?= $selected ;?>>
                                            <?= $row['nama_wilayah'] ;?></option>
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