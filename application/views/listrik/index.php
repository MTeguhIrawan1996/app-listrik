<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <div class="validation-errors" data-validationerrors="<?= validation_errors(); ?>"></div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#formModal">Tambah Jenis
                Listrik</button>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Jenis Listrik</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="4%">#</th>
                                    <th>Produk Layanan</th>
                                    <th>Daya</th>
                                    <th>Biaya</th>
                                    <th width="17%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($listrik as $data) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $data['produk_layanan']; ?></td>
                                    <td><?= $data['daya']; ?></td>
                                    <td><?= 'Rp.' . number_format($data['harga']) . ',-'; ?></td>

                                    <td>
                                        <a href="<?= base_url('listrik/ubahlistrik/'); ?><?= $data['id']; ?>"
                                            class="badge badge-success">Ubah</a>
                                        <a href="<?= base_url('listrik/hapuslistrik/'); ?><?= $data['id']; ?>"
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




<!-- Modal Tambah user -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel1">Tambah User Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('listrik') ?>" method="post">
                    <!-- <input type="hidden" name="id" id="id"> -->
                    <div class="form-group">
                        <label for="produk_layanan">Produk Layanan</label>
                        <input type="text" class="form-control" id="produk_layanan" name="produk_layanan"
                            value="<?= set_value('produk_layanan'); ?>">
                        <?= form_error('produk_layanan', '<small class="text-danger pl-3">', '</small>'); ?>

                    </div>
                    <div class="form-group">
                        <label for="daya">Daya</label>
                        <input type="number" class="form-control" id="daya" name="daya"
                            value="<?= set_value('daya'); ?>">
                        <?= form_error('daya', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="harga">Biaya</label>
                        <input type="number" class="form-control" id="harga" name="harga"
                            value="<?= set_value('harga'); ?>">
                        <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" id="tobolTambahDataUser" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>