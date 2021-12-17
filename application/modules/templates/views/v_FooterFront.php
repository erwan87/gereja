<?php
defined('BASEPATH') or exit('No direct script access allowed');
;?>
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="widget">
                    <h3 class="widget-title">Our address</h3>
                    <ul class="address">
                        <li><i class="fa fa-map-marker"></i> <?= $settings[0]['alamat'] ;?></li>
                        <li><i class="fa fa-phone"></i> <?= $settings[0]['no_telp'] ;?></li>
                        <li><i class="fa fa-envelope"></i> <?= $settings[0]['email'] ;?></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4"></div>
        </div>
        <p class="colophon">Copyright 2014 True Church. All right reserved. Modified By
            <?= $settings[0]['nama_aplikasi'] ;?> @ 2021</p>
    </div><!-- .container -->
</footer> <!-- .site-footer -->
</div>
<script src="<?= base_url('assets');?>/js/jquery-2.1.4.min.js"></script>
<script src="<?= base_url('assets');?>/js/plugins.js"></script>
<script src="<?= base_url('assets');?>/js/app.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('assets');?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>