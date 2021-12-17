        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Data Jemaat</h3>
                            </div>
                            <?= form_open_multipart('master/actionEditMajelis/'.$majelis[0]['id_majelis']);?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_majelis">Nama Majelis</label>
                                    <input type="text" class="form-control" id="nama_majelis" name="nama_majelis"
                                        placeholder="Enter Jemaat Name ...." value="<?= $majelis[0]['nama_majelis'];?>"
                                        autofocus required>
                                </div>
                            </div>

                            <div class=" card-body">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="Enter Alamat ...." value="<?= $majelis[0]['alamat'];?>" required>
                                </div>
                            </div>

                            <div class=" card-body">
                                <div class="form-group">
                                    <label for="no_telp">Nomor Telephone</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp"
                                        placeholder="Enter Phone Number ...." value="<?= $majelis[0]['no_telp'];?>"
                                        required>
                                </div>
                            </div>

                            <div class=" card-body">
                                <div class="form-group">
                                    <label for="lingkungan">Lingkungan</label>
                                    <select class="form-control" name="lingkungan" id="lingkungan">
                                        <option value="">-- Silahkan Pilih Lingkungan--</option>
                                        <?php
                                            foreach ($lingkungan as $row) {
                                                if($row['id_lingkungan'] === $lingkungan[0]['id_lingkungan']){
                                                    $select     = 'SELECTED';
                                                }else{
                                                    $select     = '';
                                                }
                                        ;?>
                                        <option value="<?=$row['id_lingkungan'];?>" <?= $select ;?>>
                                            <?= $row['nama_lingkungan'] ;?>
                                        </option>
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