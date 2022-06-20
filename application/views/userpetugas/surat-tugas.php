<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <div class="validation-errors" data-validationerrors="<?= validation_errors(); ?>"></div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Surat Tugas</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Surat</th>
                                    <th>Nama Petugas</th>
                                    <th>Kode Pengajuan</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Surat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($surat as $data) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $data['kode_surat']; ?></td>
                                    <td><?= $data['nik']; ?> || <?= $data['nama']; ?></td>
                                    <td><?= $data['kode_pengajuan']; ?></td>
                                    <td><?= $data['ket']; ?></td>
                                    <td><?= date('d F Y', $data['tgl_surat']); ?></td>
                                    <td>
                                        <a href="<?= base_url('userpetugas/detailsurat/'); ?><?= $data['id']; ?>/<?= $data['ajukan_id']; ?>"
                                            class="badge badge-success">Detail</a>
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