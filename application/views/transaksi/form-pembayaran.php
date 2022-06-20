<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow border-left-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Pembayaran</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

                    <div class="row">
                        <div class="col-lg-6">
                            <?= form_open_multipart('transaksi/formpembayaran'); ?>
                            <div class=" form-group">
                                <label for="kode_pembayaran">Kode Pembayaran</label>
                                <input type="text" class="form-control" style="width: 300px" id="kode_pembayaran"
                                    name="kode_pembayaran" value="<?= $kode_pembayaran ?>" readonly>
                                <?= form_error('kode_pembayaran', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <input type="text" class="form-control" style="width: 300px" id="pelanggan_id"
                                name="pelanggan_id" value="" hidden>
                            <div class=" form-group">
                                <label for="ajukan_id">Kode Pengajuan</label>
                                <select name="ajukan_id" id="ajukan_id" class="form-control" style="width: 300px"
                                    oninput="autofill()">
                                    <option value="">Pilih Data</option>
                                    <?php foreach ($pengajuan as $data) : ?>
                                    <option value="<?= $data['id'];?>">
                                        <?= $data['kode_pengajuan'];?> || <?= $data['nama'];?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('ajukan_id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control" style="width: 300px" id="nik" name="nik"
                                    value="" readonly>
                                <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">Nomor HP</label>
                                <input type="text" class="form-control" style="width: 300px" id="no_hp" name="no_hp"
                                    value="" readonly>
                                <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="daya">Daya</label>
                                <input type="text" class="form-control" style="width: 300px" id="daya" name="daya"
                                    value="" readonly>
                                <?= form_error('daya', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="produk_layanan">Produk Layanan</label>
                                <input type="text" class="form-control" style="width: 300px" id="produk_layanan"
                                    name="produk_layanan" value="" readonly>
                                <?= form_error('produk_layanan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="biaya">Biaya</label>
                                <input type="text" class="form-control" style="width: 300px" id="biaya" name="biaya"
                                    value="" readonly>
                                <?= form_error('biaya', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="biaya_lain">Biaya Lain-Lain</label>
                                <input type="number" class="form-control" style="width: 300px" id="biaya_lain"
                                    name="biaya_lain" value="0">
                                <?= form_error('biaya_lain', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm">
                            <button type="submit" class="btn btn-primary">Simpan</button>
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