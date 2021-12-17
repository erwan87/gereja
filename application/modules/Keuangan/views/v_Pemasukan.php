        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center text-uppercase bg-info">
                            <h5>
                                <b><?= $subbreadcumb ;?></b>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="<?= base_url('Keuangan/addPemasukan');?>" class="btn btn-info btn-sm"> <i
                                        class="fa fa-plus-circle" target="_blank"></i> Tambah</a>
                                <a href="<?= base_url('Keuangan/ReportPemasukan');?>" class="btn btn-warning btn-sm"> <i
                                        class="fa fa-print" target="_blank"></i> Laporan Pemasukan</a>
                                <div class="table-responive">
                                    <table id="tablePemasukan" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="center">
                                                    No
                                                </th>
                                                <th>#</th>
                                                <th>Akun</th>
                                                <th>Sub Akun</th>
                                                <th>Tanggal</th>
                                                <th>Nominal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>