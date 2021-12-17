        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?= $subbreadcumb ;?></h3>
                            </div>
                            <?= form_open_multipart('Keuangan/actionAddPemasukan');?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="mainAkun">Main Akun</label>
                                    <select class="form-control" id="mainAkun" name="mainAkun">
                                        <option value=""> - Silahkan Pilih -</option>
                                        <option value="1">Penerimaan</option>
                                    </select>
                                </div>

                                <div id="akun" class="form-group" style="display:none;">
                                    <label for="Akun">Akun</label>
                                    <select class="form-control" id="Akun" name="Akun">
                                    </select>
                                </div>

                                <div id="subakun" class="form-group" style="display:none;">
                                    <label for="subAkun">Sub Akun</label>
                                    <select class="form-control" id="subAkun" name="subAkun">
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tgl_pemasukan">Tanggal</label>
                                    <input type="text" class="form-control tgl_pemasukan" id="tgl_pemasukan"
                                        name="tgl_pemasukan" placeholder="Enter Tanggal ...." autocomplete="off"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="nominal">Nominal</label>
                                    <input type="text" class="form-control" id="nominal" name="nominal"
                                        placeholder="Enter Nominal ...." autocomplete="off" required>
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
    $(".tgl_pemasukan").datepicker({
        format: "dd MM yyyy",
        autoclose: true,
        todayHighlight: true,
    });
});
        </script>