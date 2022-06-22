<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <div class="validation-errors" data-validationerrors="<?= validation_errors(); ?>"></div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan Pemasangan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Pengajuan</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Kelurahan</th>
                                    <th>Kecamatan</th>
                                    <th>Provinsi</th>
                                    <th>Produk Layanan</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pengajuan as $data) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $data['kode_pengajuan']; ?></td>
                                    <td><?= $data['nik']; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td><?= $data['alamat']; ?></td>
                                    <td><?= $data['kelurahan']; ?></td>
                                    <td><?= $data['kecamatan']; ?></td>
                                    <td><?= $data['provinsi']; ?></td>
                                    <td><?= $data['produk_layanan']; ?> || <?= $data['daya']; ?></td>
                                    <td><?= date('d F Y', $data['tgl_pengajuan']); ?></td>
                                    <td><?php if ($data['status'] == 0) {
                                                echo '<span class="badge badge-warning mb-2">Menunggu Verifikasi</span>';
                                            } elseif ($data['status'] == 1) {
                                                echo '<span class="badge badge-danger mb-2">Ditolak</span>';
                                            }  elseif ($data['status'] == 2) {
                                                echo '<span class="badge badge-success mb-2">Diverifikasi</span>';
                                            } elseif ($data['status'] == 3) {
                                                echo '<span class="badge badge-success mb-2">Proses Survey</span>';
                                            }  elseif ($data['status'] == 4) {
                                                echo '<span class="badge badge-success mb-2">Dibayar dan Proses Pemasangan</span>';
                                            }  elseif ($data['status'] == 5) {
                                                echo '<span class="badge badge-success mb-2">Pemasangan Selesai</span>';
                                            } ?></td>
                                    <td>
                                        <?php if ($data['status'] == 2) {
                                                echo '';
                                            }  elseif ($data['status'] == 3) {
                                                echo '';
                                            }  elseif ($data['status'] == 4) {
                                                echo '';
                                            }  elseif ($data['status'] == 5) {
                                                echo '';
                                            }  else {
                                                echo '<a href="'.base_url('transaksi/verifikasi/').''.$data['id'].'/'.$data['user_id'].'"                                           class="badge badge-success">Verifikasi</a>';
                                            } ?>

                                        <!-- <a href=" <?=base_url('transaksi/verifikasi/'); ?><?= $data['id']?>/<?= $data['user_id']?>"
                                            class="badge badge-success">Verifikasi</a> -->
                                        <a href="<?= base_url('transaksi/hapus/'); ?><?= $data['id']; ?>/<?= $data['user_id']?>"
                                            class="badge badge-danger tombol-hapus">Tolak</a>

                                    </td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
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