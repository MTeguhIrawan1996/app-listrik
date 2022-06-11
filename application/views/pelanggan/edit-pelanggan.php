<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Lengkapi Data Pelanggan</h1>

    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('pelanggan/editpelanggan'); ?>
            <div class="form-group row">
                <label for="nik" class="col-md-3 col-form-label">Nik</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="nik" id="nik" value="<?= $user['nik']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-md-3 col-form-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="username" id="username"
                        value="<?= $user['username']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="no_hp" class="col-md-3 col-form-label">Nomor Telepon</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="no_hp" id="no_hp" value="<?= $user['no_hp']; ?>">
                    <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-md-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $user['nama']; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-md-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $user['alamat']; ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="kelurahan" class="col-md-3 col-form-label">Kelurahan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="kelurahan" id="kelurahan"
                        value="<?= $user['kelurahan']; ?>">
                    <?= form_error('kelurahan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="kecamatan" class="col-md-3 col-form-label">Kecamatan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="kecamatan" id="kecamatan"
                        value="<?= $user['kecamatan']; ?>">
                    <?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="provinsi" class="col-md-3 col-form-label">Provinsi</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="provinsi" id="provinsi"
                        value="<?= $user['provinsi']; ?>">
                    <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->