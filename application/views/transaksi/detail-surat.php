<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow border-left-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Surat Tugas</h6>
        </div>
        <div class="card-body">
            <table cellspacing="0" width="70%">
                <tr>
                    <td width="25%">
                        <h5><b>Kode Surat</b></h5>
                    </td>
                    <td>
                        <h5><b>:</b></h5>
                    </td>
                    <td>
                        <h5>
                            <b>
                                <?=$surat['kode_surat']; ?>
                            </b>
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td width="25%">
                        <h5><b>Kode Pengajuan</b> </h5>
                    </td>
                    <td>
                        <h5><b>:</b></h5>
                    </td>
                    <td>
                        <h5>
                            <b>
                                <?=$surat['kode_pengajuan']; ?>
                            </b>
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td width="25%">
                        <h5><b>NIK Petugas</b> </h5>
                    </td>
                    <td>
                        <h5><b>:</b></h5>
                    </td>
                    <td>
                        <h5>
                            <b>
                                <?=$surat['nik']; ?>
                            </b>
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td width="30%">
                        <h5><b>Nama Petugas</b></h5>
                    </td>
                    <td>
                        <h5><b>:</b></h5>
                    </td>
                    <td>
                        <h5>
                            <b>
                                <?=$surat['nama']; ?>
                            </b>
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td width="25%">
                        <h5><b>Keterangan Tugas</b> </h5>
                    </td>
                    <td>
                        <h5><b>:</b></h5>
                    </td>
                    <td>
                        <h5>
                            <b>
                                <?=$surat['ket']; ?>
                            </b>
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td width="25%">
                        <h5><b>Tanggal Surat</b> </h5>
                    </td>
                    <td>
                        <h5><b>:</b></h5>
                    </td>
                    <td>
                        <h5>
                            <b>
                                <?=date('d F Y', $surat['tgl_surat']); ?>
                            </b>
                        </h5>
                    </td>
                </tr>
            </table>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Nama</th>
                            <th>Nomor Hp</th>
                            <th>Produk Layanan</th>
                            <th>Daya</th>
                            <th>Alamat</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Provinsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <tr>
                            <td><?=$i; ?></td>
                            <td><?=$pengajuan['nama']; ?></td>
                            <td><?=$pengajuan['no_hp']; ?></td>
                            <td><?=$pengajuan['produk_layanan']; ?></td>
                            <td><?=$pengajuan['daya']; ?></td>
                            <td><?=$pengajuan['alamat']; ?></td>
                            <td><?=$pengajuan['kecamatan']; ?></td>
                            <td><?=$pengajuan['kelurahan']; ?></td>
                            <td><?=$pengajuan['provinsi']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    </tbody>
                </table>

                <div class="col-sm-0">
                    <button type="submit" class="btn btn-warning">Cetak</button>
                    <?php
                    $role_id = $this->session->userdata('role_id');
                    
                    // admin
                    if ($role_id == 1) : ?>
                    <?php if ($pengajuan['status'] == 4) {
                        echo '<a href="'. base_url('transaksi/selesaipemasangan/').''. $pengajuan['id'] .'/'. $pengajuan['user_id'].'"
                        class="btn btn-success tombol-hapus">Pemasangan
                        Selesai</a>';
                    } else {
                        echo '';
                    } ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#formModal2">Aksi</button>
                    <a href="<?= base_url('transaksi/surattugas'); ?>" class="btn btn-danger">Kembali</a>

                    <!-- Petugas -->
                    <?php else : ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#formModal1">Aksi</button>
                    <a href="<?= base_url('userpetugas/surattugas'); ?>" class="btn btn-danger">Kembali</a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<div class="modal fade" id="formModal1" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel1">Keterangan Tugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('userpetugas/aksi') ?>" method="post">
                    <div class="form-group row">
                        <input type="text" class="form-control" name="id" value="<?= $surat['id']; ?>" hidden>
                        <label for="ket" class="col-md-3 col-form-label">Hasil Tugas</label>
                        <div class="col-sm-9">
                            <select name="ket" id="ket" class="form-control" style="width: 300px">
                                <option value="">Pilih Data</option>
                                <option value="BISA DILAKUKAN PEMASANGAN">Dapat dilakukan pemasangan</option>
                                <option value="TIDAK BISA DILAKUKAN PEMASANGAN">Tidak bisa dilakukan pemasangan</option>
                                <option value="PEMASANGAN SELESAI">Pemasangan Selesai</option>
                            </select>
                            <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" id="tobolTambahDataPetugas" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="formModal2" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel1">Keterangan Tugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('transaksi/aksi') ?>" method="post">
                    <div class="form-group row">
                        <input type="text" class="form-control" name="id" value="<?= $surat['id']; ?>" hidden>
                        <label for="ket" class="col-md-2 col-form-label">Feedback</label>
                        <div class="col-sm-10">
                            <select name="ket" id="ket" class="form-control" style="width: 300px">
                                <option value="">Pilih Data</option>
                                <option value="LAKUKAN SURVEY">Lakukan Survey</option>
                                <option value="Lakukan PEMASANGAN">Lakukan Pemasangan</option>
                                <option value="PEMASANGAN SELESAI">Pemasangan Selesai</option>
                            </select>
                            <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" id="tobolTambahDataPetugas" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<!-- End of Main Content -->