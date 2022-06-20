<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg">
            <div class="validation-errors" data-validationerrors="<?= validation_errors(); ?>"></div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <a href="<?= base_url('transaksi/formpembayaran'); ?>" class="btn btn-primary mb-3">Tambah Pembayaran</a>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Pembayaran</th>
                                    <th>Kode Pengajuan</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Biaya Lain-Lain</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th width="16%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pembayaran as $data) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $data['kode_pembayaran']; ?></td>
                                    <td><?= $data['kode_pengajuan']; ?></td>
                                    <th><?= date('d F Y', strtotime($data['tgl_pembayaran'])); ?></th>
                                    <td><?= 'Rp.' . number_format($data['harga_lain']) . ',-'; ?></td>
                                    <th><?= 'Rp.' . number_format($data['total']) . ',-'; ?></th>
                                    <td><?php if ($data['status'] == 0) {
                                                echo '<span class="badge badge-warning mb-2">Belum Lunas</span>';
                                            } elseif ($data['status'] == 1) {
                                                echo '<span class="badge badge-success mb-2">Lunas</span>';
                                            } ?></td>
                                    <td><?php if ($data['status'] == 0) {
                                                echo '<a href="'.base_url('transaksi/bayar/').''.$data['id'].'/'.$data['user_id'].'"                                           class="badge badge-success">Bayar</a>';
                                            }  elseif ($data['status'] == 1) {
                                                echo '';
                                            } ?>
                                        <a href="<?= base_url('transaksi/hapuspembayaran/'); ?><?= $data['id']; ?>"
                                            class="badge badge-danger tombol-hapus">Hapus</a>
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