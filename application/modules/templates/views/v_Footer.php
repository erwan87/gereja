<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2021 <?= $settings[0]['nama_aplikasi'] ;?></strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 0.0.-tr
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url('assets');?>/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/livequery/1.1.1/jquery.livequery.js">
</script>
<!-- Bootstrap -->
<script src="<?= base_url('assets');?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets');?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?=base_url('assets');?>/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets');?>/js/adminlte.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>

<script src="<?= base_url('assets'); ?>/plugins/summernote-master/summernote.min.js"></script>
<!-- PAGE PLUGINS -->

<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets');?>/js/demo.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets');?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets');?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets');?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets');?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets');?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets');?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets');?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets');?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets');?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets');?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets');?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets');?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
$(document).ready(function() {

    $('#summernote').summernote({
        height: 590,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ["fullscreen", "codeview", "help"]],
        ],

        onImageUpload: function(files, editor, welEditable) {
            sendFile(files[0], editor, welEditable);
        }

    });

    function sendFile(file, editor, welEditable) {
        data = new FormData();
        data.append("file", file);
        $.ajax({
            data: data,
            type: "POST",
            url: "<?php echo site_url('Warta') ?>/upload_image",
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                editor.insertImage(welEditable, url);
            }
        });
    }
});
</script>

<!-- Include Modjs -->
<script src="
        <?php
                if ($this->uri->segment('2')==''||$this->uri->segment('2')==null) {
                    echo base_url('modjs/'.$this->uri->segment('1').'.js');
                } else {
                    echo base_url('modjs/'.$this->uri->segment('1').'/'.$this->uri->segment('2').'.js');
                };
    ;?>">
</script>
</body>

</html>