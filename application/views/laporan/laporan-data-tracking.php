<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow border-left-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pilih Pelanggan</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <form target="_blank" action="" method="post">
                        <div class="form-group row">
                            <label for="ajukan_id" class="col-md-4 col-form-label">Kode Pengajuan</label>
                            <div class="col-sm-8">
                                <select name="ajukan_id" id="ajukan_id" class="form-control" style="width: 300px">
                                    <option value="">Pilih Data</option>
                                    <?php foreach ($pengajuan as $data) : ?>
                                    <option value="<?= $data['user_id'];?>">
                                        <?= $data['kode_pengajuan'];?> || <?= $data['nama'];?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('ajukan_id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-0">
                            <button type="submit" class="btn btn-warning">Cetak</button>
                            <button type="button" class="btn btn-primary tombol-laporan-tracking">Proses</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg">
            <div class="validation-errors" data-validationerrors="<?= validation_errors(); ?>"></div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Data Tracking</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Pengajuan</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
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