<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow border-left-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tracking Proses Pengajuan</h6>
        </div>
        <div class="card-body">
            <table cellspacing="0" width="70%">
                <tr>
                    <td width="25%">
                        <h5><b>Kode Pengajuan</b></h5>
                    </td>
                    <td>
                        <h5><b>:</b></h5>
                    </td>
                    <td>
                        <h5>
                            <b>
                                <?php if (empty($pengajuan['kode_pengajuan'])) {
                                            echo '';
                                        } else {
                                            echo ($pengajuan['kode_pengajuan']);
                                        } ?>
                            </b>
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td width="25%">
                        <h5><b>Produk Layanan</b> </h5>
                    </td>
                    <td>
                        <h5><b>:</b></h5>
                    </td>
                    <td>
                        <h5>
                            <b>
                                <?php if (empty($pengajuan['produk_layanan'])) {
                                            echo '';
                                        } else {
                                            echo ($pengajuan['produk_layanan']);
                                        } ?>
                            </b>
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td width="25%">
                        <h5><b>Daya</b> </h5>
                    </td>
                    <td>
                        <h5><b>:</b></h5>
                    </td>
                    <td>
                        <h5>
                            <b>
                                <?php if (empty($pengajuan['daya'])) {
                                            echo '';
                                        } else {
                                            echo ($pengajuan['daya']);
                                        } ?>
                            </b>
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td width="25%">
                        <h5><b>Tanggal pengajuan</b> </h5>
                    </td>
                    <td>
                        <h5><b>:</b></h5>
                    </td>
                    <td>
                        <h5>
                            <b>
                                <?php if (empty($pengajuan['tgl_pengajuan'])) {
                                            echo '';
                                        } else {
                                            echo date('d F Y', $pengajuan['tgl_pengajuan']);
                                        } ?>
                            </b>
                        </h5>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="sell" role="tabpanel" aria-labelledby="sell-tab">

            <div class="row mt-3">
                <?php $i = 1; ?>
                <?php foreach ($tracking as $data) : ?>
                <div class="col-12 mt-1">
                    <a class="card card-list d-block">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <?= $i; ?>
                                </div>
                                <div class="col-md-5">
                                    <?= $data['ket']; ?>
                                </div>
                                <div class="col-md-1 d-none d-md-block">
                                    <img src="<?= base_url('assets/img/dashboard-arrow-right.svg') ?>" alt="" />
                                </div>
                                <div class="col-md-5">
                                    <?= date('d F Y', strtotime($data['tgl_tracking'])); ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php $i++; ?>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->