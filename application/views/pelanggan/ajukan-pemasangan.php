<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow border-left-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Pengajuan Pemasangan</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <div class="alert alert-success" role="alert">Lengkapi Data Anda Sebelum Mengajukan Pemasangan</div>
                    <?= form_error('kode_pengajuan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

                    <div class="row">
                        <div class="col-lg-6">
                            <?= form_open_multipart('pelanggan/ajukanpemasangan'); ?>
                            <div class=" form-group">
                                <label for="kode_pengajuan">Kode Pengajuan</label>
                                <input type="text" class="form-control" style="width: 300px" id="kode_pengajuan"
                                    name="kode_pengajuan" value="<?= $kode_pengajuan ?>" readonly>
                            </div>
                            <div class=" form-group">
                                <label for="user_id">Nik</label>
                                <select name="user_id" id="user_id" class="form-control" style="width: 300px">
                                    <option value="">Pilih Data</option>
                                    <option value="<?= $user['id'];?>"><?= $user['nik'];?> || <?= $user['nama'];?>
                                    </option>
                                </select>
                                <?= form_error('user_id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class=" form-group">
                                <label for="no_hp">Nomor Telepon</label>
                                <input name="no_hp" id="no_hp" class="form-control" readonly style="width: 300px"
                                    placeholder="<?= $user['no_hp'];?>">
                                </input>
                            </div>
                            <div class=" form-group">
                                <label for="alamat">Alamat</label>
                                <input name="alamat" id="alamat" class="form-control" readonly style="width: 300px"
                                    placeholder="<?= $user['alamat'];?>">
                                </input>
                            </div>
                            <div class=" form-group">
                                <label for="kelurahan">Kelurahan</label>
                                <input name="kelurahan" id="kelurahan" class="form-control" readonly
                                    style="width: 300px" placeholder="<?= $user['kelurahan'];?>">
                                </input>
                            </div>
                            <div class=" form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <input name="kecamatan" id="kecamatan" class="form-control" readonly
                                    style="width: 300px" placeholder="<?= $user['kecamatan'];?>">
                                </input>
                            </div>
                            <div class=" form-group">
                                <label for="provinsi">Provinsi</label>
                                <input name="provinsi" id="provinsi" class="form-control" readonly style="width: 300px"
                                    placeholder="<?= $user['provinsi'];?>">
                                </input>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm">
                            <button type="submit" class="btn btn-primary">Proses</button>
                            <a href="<?= base_url('pelanggan'); ?>" class="btn btn-primary">Kembali</a>
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