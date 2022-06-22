<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow border-left-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Periode</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <form target="_blank" action="" method="post">
                        <div class="form-group row">
                            <label for="tgl_awal" class="col-md-3 col-form-label">Tanggal Awal</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tgl_awal" id="tgl_awal">
                                <?= form_error('tgl_awal', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_akhir" class="col-md-3 col-form-label">Tanggal Akhir</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir">
                                <?= form_error('tgl_akhir', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-0">
                            <button type="submit" class="btn btn-warning">Cetak</button>
                            <button type="button" class="btn btn-primary tombol-laporan-survey">Proses</button>
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
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Hasil Survey</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Surat</th>
                                    <th>Nama Petugas</th>
                                    <th>Kode Pengajuan</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal surat</th>
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