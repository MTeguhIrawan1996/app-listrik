<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow border-left-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form surat tugas</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

                    <div class="row">
                        <div class="col-lg-4">
                            <?= form_open_multipart('transaksi/formsurattugas'); ?>
                            <div class=" form-group">
                                <label for="kode_surat">Kode Surat</label>
                                <input type="text" class="form-control" style="width: 300px" id="kode_surat"
                                    name="kode_surat" value="<?= $kode_surat ?>" readonly>
                                <?= form_error('kode_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="user_id">Nama Petugas</label>
                                <select name="user_id" id="user_id" class="form-control" style="width: 300px">
                                    <option value="">Pilih Data</option>
                                    <?php foreach ($petugas as $data) : ?>
                                    <option value="<?= $data['id'];?>"><?= $data['nik'];?> || <?= $data['nama'];?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('user_id', '<small class="text-danger pl-3">', '</small>'); ?>
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
                                <label for="ket">Keterangan</label>
                                <select name="ket" id="ket" class="form-control" style="width: 300px">
                                    <option value="">Pilih Data</option>
                                    <option value="LAKUKAN SURVEY">Lakukan Survey Lapangan</option>
                                </select>
                                <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
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
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" style="width: 300px" id="alamat" name="alamat"
                                    value="" readonly>
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="produk_layanan">Produk Layanan</label>
                                <input type="text" class="form-control" style="width: 300px" id="produk_layanan"
                                    name="produk_layanan" value="" readonly>
                                <?= form_error('produk_layanan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="kelurahan">Kelurahan</label>
                                <input type="text" class="form-control" style="width: 300px" id="kelurahan"
                                    name="kelurahan" value="" readonly>
                                <?= form_error('kelurahan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <input type="text" class="form-control" style="width: 300px" id="kecamatan"
                                    name="kecamatan" value="" readonly>
                                <?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <input type="text" class="form-control" style="width: 300px" id="provinsi"
                                    name="provinsi" value="" readonly>
                                <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="daya">Daya</label>
                                <input type="text" class="form-control" style="width: 300px" id="daya" name="daya"
                                    value="" readonly>
                                <?= form_error('daya', '<small class="text-danger pl-3">', '</small>'); ?>
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