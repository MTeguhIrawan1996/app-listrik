<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow border-left-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Jenis Listrik</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <form action="<?= base_url('listrik/ubahlistrik/') ?><?= $listrik['id']; ?>" method="post">
                        <input type="hidden" name="id" value="<?= $listrik['id']; ?>">
                        <div class="form-group row">
                            <label for="produk_layanan" class="col-md-3 col-form-label">Produk Layanan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="produk_layanan" id="produk_layanan"
                                    value="<?= $listrik['produk_layanan']; ?>">
                                <?= form_error('produk_layanan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="daya" class="col-md-3 col-form-label">Daya</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="daya" id="daya"
                                    value="<?= $listrik['daya']; ?>">
                                <?= form_error('daya', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga" class="col-md-3 col-form-label">Biaya</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="harga" id="harga"
                                    value="<?= $listrik['harga']; ?>">
                                <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <a href="<?= base_url('listrik'); ?>" class="btn btn-primary">Kembali</a>
                            </div>
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