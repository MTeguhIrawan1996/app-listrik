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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->