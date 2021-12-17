        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?= $subbreadcumb ;?></h3>
                            </div>
                            <?= form_open_multipart('master/actionEditDetKeluarga/'.$keluarga[0]['id_keluarga_detail']);?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="no_kk">Nomor KK</label>
                                    <input type="text" class="form-control" id="no_kk" name="no_kk"
                                        value="<?= $keluarga[0]['no_kk'];?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="nama_jemaat">Nama</label>
                                    <input type="text" class="form-control" id="nama_jemaat" name="nama_jemaat"
                                        placeholder="Masukkan Nama ...." value="<?= $keluarga[0]['nama'];?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin <?= $keluarga[0]['jk'] ;?></label>
                                    <br>
                                    <input type="radio" class="form-input" id="jk" name="jk" value="Laki - Laki" <?php
                                    if($keluarga[0]['jk']==="Laki - Laki"){
                                        echo 'CHECKED';
                                    }else{
                                        echo '';
                                    }
                                    ;?>> Laki -
                                    Laki
                                    <input type="radio" class="form-input" id="jk" name="jk" value="Perempuan" <?php
                                    if($keluarga[0]['jk']==="Perempuan"){
                                        echo 'CHECKED';
                                    }else{
                                        echo '';
                                    }
                                    ;?>>
                                    Perempuan
                                </div>

                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="text" class="form-control tglLahir" id="tgl_lahir" name="tgl_lahir"
                                        placeholder="Enter Tanggal Lahir ...."
                                        value="<?= tgl_indo($keluarga[0]['tgl_lahir']);?>" autocomplete=" off" required>
                                </div>

                                <div class="form-group">
                                    <label for="no_telp">Nomor Telephone</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp"
                                        placeholder="Masukkan Nomor Telepon Keluarga ...."
                                        value="<?= $keluarga[0]['no_telp'];?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="pendidikan">Pendidikan</label>
                                    <input type="text" class="form-control" id="pendidikan" name="pendidikan"
                                        placeholder="Masukkan Pendidikan Anggota Keluarga ...."
                                        value="<?= $keluarga[0]['pendidikan'];?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="text" class="form-control" id="status" name="status"
                                        placeholder="Masukkan Status Anggota Keluarga ...."
                                        value="<?= $keluarga[0]['status'];?>" required>
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
        <script>
$(function() {
    $(".tglLahir").datepicker({
        format: "dd MM yyyy",
        autoclose: true,
        todayHighlight: true,
    });
});
        </script>