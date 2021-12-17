        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?= $subbreadcumb ;?></h3>
                            </div>
                            <?= form_open_multipart('Warta/actionEditWarta/'.$Warta[0]['id_warta']);?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tgl_warta">Tanggal Warta</label>
                                    <input type="text" class="form-control tgl_misa" id="tgl_warta" name="tgl_warta"
                                        placeholder="Enter Tanggal Terbit Warta ...." autocomplete="off" autofocus
                                        value="<?= tgl_indo($Warta[0]['tgl_warta']);?>">
                                </div>

                                <div class="form-group">
                                    <label for="dukungan">Mohon Dukungan Doa</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="dukungan"
                                            id="dukungan"><?= $Warta[0]['dukungan'] ;?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="thanks">Ucapan Terima Kasih</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="thanks"
                                            id="thanks"><?= $Warta[0]['thanks'] ;?></textarea>
                                    </div>
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
    $(".tgl_misa").datepicker({
        format: "dd MM yyyy",
        autoclose: true,
        todayHighlight: true,
    });
});

$(document).ready(function() {

    $('#dukungan').summernote({
        height: 250,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ["fullscreen", "codeview", "help"]],
        ],
    });
    $('#thanks').summernote({
        height: 250,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ["fullscreen", "codeview", "help"]],
        ],
    });
});
        </script>