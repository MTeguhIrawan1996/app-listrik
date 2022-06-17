<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <div class="validation-errors" data-validationerrors="<?= validation_errors(); ?>"></div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <a href="<?= base_url('pelanggan/ajukanpemasangan'); ?>" class="btn btn-primary mb-3">Form Pengajuan
                Pemasangan</a>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan Anda</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php if (empty($pengajuan['user_id'])) : ?>
                        <div>
                            Satatus:
                        </div>
                        <?php elseif ($pengajuan['status'] == 0) : ?>
                        <div>
                            Satatus:
                            <span class="badge badge-danger mb-2">Menunggu Verifikasi</span>
                        </div>
                        <?php elseif ($pengajuan['status'] == 1) : ?>
                        <div>
                            Satatus:
                            <span class="badge badge-danger mb-2">Pengajuan ditolak</span>
                        </div>
                        <?php elseif ($pengajuan['status'] == 2) : ?>
                        <div>
                            Satatus:
                            <span class="badge badge-success mb-2">Disetujui akan dilakukan survey</span>
                        </div>
                        <?php endif; ?>
                        <!-- Layanan -->
                        <?php if (empty($pengajuan['user_id'])) : ?>
                        <div>
                            Layanan:
                        </div>
                        <?php else : ?>
                        <div>
                            Layanan:
                            <span class="badge badge-success mb-2"><?= $pengajuan['produk_layanan'] ;?></span>
                            <span class="badge badge-success mb-2"><?= $pengajuan['daya'] ;?></span>
                        </div>
                        <?php endif; ?>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kode Pengajuan</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Nomor Hp</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Alamat</th>
                                    <th>Kelurahan</th>
                                    <th>Kecamatan</th>
                                    <th>Provinsi</th>
                                    <?php if (!empty($pengajuan['status']) == 0) : ?>
                                    <th width="15%">Action</th>
                                    <?php elseif (!empty($pengajuan['status']) == 1) : ?>

                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php if (empty($pengajuan['kode_pengajuan'])) {
                                            echo '';
                                        } else {
                                            echo ($pengajuan['kode_pengajuan']);
                                        }
                                            ?>
                                    </td>
                                    <td><?php if (empty($pengajuan['user_id'])) {
                                            echo '';
                                        } else {
                                            echo ($pengajuan['nik']);
                                        }
                                            ?>
                                    </td>
                                    <td><?php if (empty($pengajuan['nama'])) {
                                            echo '';
                                        } else {
                                            echo ($pengajuan['nama']);
                                        }
                                            ?>
                                    </td>
                                    <td><?php if (empty($pengajuan['no_hp'])) {
                                            echo '';
                                        } else {
                                            echo ($pengajuan['no_hp']);
                                        }
                                            ?>
                                    </td>
                                    <td>
                                        <?php if (empty($pengajuan['tgl_pengajuan'])) {
                                            echo '';
                                        } else {
                                            echo date('d F Y', $pengajuan['tgl_pengajuan']);
                                        } ?>
                                    </td>
                                    <td><?php if (empty($pengajuan['alamat'])) {
                                            echo '';
                                        } else {
                                            echo ($pengajuan['alamat']);
                                        }
                                            ?>
                                    </td>
                                    <td><?php if (empty($pengajuan['kelurahan'])) {
                                            echo '';
                                        } else {
                                            echo ($pengajuan['kelurahan']);
                                        }
                                            ?>
                                    </td>
                                    <td><?php if (empty($pengajuan['kecamatan'])) {
                                            echo '';
                                        } else {
                                            echo ($pengajuan['kecamatan']);
                                        }
                                            ?>
                                    </td>
                                    <td><?php if (empty($pengajuan['provinsi'])) {
                                            echo '';
                                        } else {
                                            echo ($pengajuan['provinsi']);
                                        }
                                            ?>
                                    </td>
                                    <?php if (!empty($pengajuan['status']) == 0) : ?>
                                    <!-- tamppilkan tombol batal -->
                                    <td>
                                        <?php if (empty($pengajuan['user_id'])) : ?>
                                        <!-- Kosong -->
                                        <?php elseif (!empty($pengajuan['status']) == 0)  : ?>
                                        <a href="<?= base_url('pelanggan/batalpengajuan/'); ?><?php if (empty($pengajuan['id'])) {
                                            echo '';
                                        } else {
                                            echo ($pengajuan['id']);
                                        } ?>" class="badge badge-danger tombol-hapus">Batal</a>
                                        <?php endif; ?>
                                    </td>
                                    <?php elseif (!empty($pengajuan['status']) == 1 ) : ?>

                                    <?php endif; ?>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->