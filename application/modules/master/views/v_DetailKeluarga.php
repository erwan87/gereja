        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <a href="<?= base_url('master/addKeluargaKK/'.$keluarga[0]['no_kk']);?>" class="btn btn-info btn-sm"> <i
                        class="fa fa-plus-circle"></i> Tambah</a>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2">
                                No KK :
                            </div>
                            <div class="col-sm-6">
                                <?= $keluarga[0]['no_kk'] ;?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                Keluarga
                            </div>
                            <div class="col-sm-6">
                                <a href="<?= base_url('master/keluarga');?>"><?= $keluarga[0]['nama'] ;?></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                Alamat :
                            </div>
                            <div class="col-sm-6">
                                <?= $keluarga[0]['alamat'] ;?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                Nomor Telephone :
                            </div>
                            <div class="col-sm-6">
                                <?= $keluarga[0]['no_telp'] ;?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                Total Orang Dalam 1 KK
                            </div>
                            <div class="col-sm-6">
                                <?= $totalKeluarga ;?> Orang
                            </div>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responive">
                                    <table id="tableDetKeluarga" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="center">
                                                    No
                                                </th>
                                                <th>Nama</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Nomor Telephone</th>
                                                <th>Pendidikan</th>
                                                <th>Status</th>
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