        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?= $subbreadcumb ;?></h3>
                            </div>
                            <?= form_open_multipart('Keuangan/actionEditPengeluaran/'.$pengeluaran[0]['id_pengeluaran']);?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="mainAkun">Main Akun</label>
                                    <select class="form-control" id="mainAkun" name="mainAkun">
                                        <option value="1 "
                                            <?php $pengeluaran[0]['id_main_akun']===1 ? $selected='SELECTED' : $selected = ''; echo $selected; ;?>>
                                            Penerimaan</option>
                                    </select>
                                </div>

                                <div id="akun" class="form-group">
                                    <label for="Akun">Akun</label>
                                    <select class="form-control" id="Akun" name="Akun">
                                        <?php
                                    foreach ($akun as $data) {
                                        if($data['id_akun']===$pengeluaran[0]['id_akun']){
                                            $selected = 'SELECTED';
                                        }else{
                                            $selected = '';
                                        }
                                        ;?>
                                        <option value="<?= $data['id_akun'];?>" <?= $selected ;?>>
                                            <?= $data['nama_akun'];?></option>
                                        <?php }
                                    ;?>
                                    </select>
                                </div>

                                <div id="subakun" class="form-group">
                                    <label for="subAkun">Sub Akun</label>
                                    <select class="form-control" id="subAkun" name="subAkun">
                                        <?php
                                    foreach ($subakun as $data) {
                                        if($data['id_sub_akun']===$pengeluaran[0]['id_sub_akun']){
                                            $selected = 'SELECTED';
                                        }else{
                                            $selected = '';
                                        }
                                        ;?>
                                        <option value="<?= $data['id_sub_akun'];?>" <?= $selected ;?>>
                                            <?= $data['nama_sub_akun'];?></option>
                                        <?php }
                                    ;?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tgl_pengeluaran">Tanggal</label>
                                    <input type="text" class="form-control tgl_pemasukan" id="tgl_pengeluaran"
                                        name="tgl_pengeluaran" value="<?= tgl_indo($pengeluaran[0]['tanggal']);?>"
                                        placeholder="Enter Tanggal ...." autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <label for="nominal">Nominal</label>
                                    <input type="text" class="form-control" id="nominal" name="nominal"
                                        placeholder="Enter Nominal ...." autocomplete="off"
                                        value="<?= $pengeluaran[0]['nominal'];?>" required>
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
    $(" .tgl_pemasukan").datepicker({
        format: "dd MM yyyy",
        autoclose: true,
        todayHighlight: true,
    });
});
        </script>