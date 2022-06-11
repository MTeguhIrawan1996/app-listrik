<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <div class="validation-errors" data-validationerrors="<?= validation_errors(); ?>"></div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#formModal">Tambah
                Petugas
                Baru</button>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Petugas</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="4%">#</th>
                                    <th>NIK</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Nomor HP</th>
                                    <th width="17%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($petugas as $data) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $data['nik']; ?></td>
                                    <td><?= $data['username']; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td><?= $data['no_hp']; ?></td>

                                    <td>
                                        <a href="<?= base_url('petugas/resetpetugas/'); ?><?= $data['id']; ?>"
                                            class="badge badge-success">Reset
                                            Password</a>
                                        <a href="<?= base_url('petugas/hapuspetugas/'); ?><?= $data['id']; ?>"
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
                <h5 class="modal-title" id="formModalLabel1">Tambah Petugas Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('petugas') ?>" method="post">
                    <!-- <input type="hidden" name="id" id="id"> -->
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="<?= set_value('nik'); ?>">
                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>

                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="<?= set_value('username'); ?>">
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>

                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password1" name="password1" value="">
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password2">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password2" name="password2" value="">
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp"
                            value="<?= set_value('no_hp'); ?>">
                        <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" id="tobolTambahDataPetugas" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>