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
                        <h5><b>Keterangan surat</b> </h5>
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
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php $i++; ?>
                    </tbody>
                </table>

                <div class="col-sm-0">
                    <button type="submit" class="btn btn-primary">Cetak</button>
                    <a href="<?= base_url('transaksi/surattugas'); ?>" class="btn btn-primary">Kembali</a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->