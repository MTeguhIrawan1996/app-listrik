<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>style-laporan.css" media="all" />
    <style type="text/css" media="print">
    @page {
        size: landscape;
    }
    </style>
</head>

<body>
    <header class="clearfix">
        <div style="text-align: center; font-weight: bold;">
            <img src="<?= base_url('assets/img/pln.png') ?>" style="height: 110px" ; width="auto">
        </div>
        <br>
        <div id="kop" class="clearfix">
            <div>GERAI DIMAS</div>
            <div>KAPUAS</div>
            <div>KALIMANTAN TENGAH</div>
            <div style="font-size: 10px;">Jalan S.Parman Gg Kalimantan II Kuala kapuas Email:dimass@gmail.com</div>
        </div>
        <header class="clearfix">
            <h1>Laporan Data Pengajuan Pemasangan</h1>
            <div class="kiri" style="text-align:left;">
                <div>Kuala Kapuas,<?= date('d-m-Y'); ?> </div>
            </div>
            <div class="kanan" style="text-align:right;">
                <div>Data Pemasangan</div>
                <div>Periode
                    <?= date('d-m-Y', strtotime($tglawal)) ?> Sd <?= date('d-m-Y', strtotime($tglakhir)) ?>
                </div>
            </div>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Pengajuan</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Produk Layanan</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($laporan as $data) : ?>
                    <tr>
                        <td align="center"><?= $i; ?></td>
                        <td align="center"><?= $data['kode_pengajuan']; ?></td>
                        <td align="center"><?= $data['nik']; ?></td>
                        <td align="center"><?= $data['nama']; ?></td>
                        <td align="center"><?= $data['alamat']; ?></td>
                        <td align="center"><?= $data['produk_layanan']; ?></td>
                        <td align="center"><?= date('d F Y', $data['tgl_pengajuan']); ?></td>
                        <td align="center"><?php if ($data['status'] == 0) {
                                                echo '<span class="badge badge-warning mb-2">Menunggu Verifikasi</span>';
                                            } elseif ($data['status'] == 1) {
                                                echo '<span class="badge badge-danger mb-2">Ditolak</span>';
                                            }  elseif ($data['status'] == 2) {
                                                echo '<span class="badge badge-success mb-2">Diverifikasi</span>';
                                            } elseif ($data['status'] == 3) {
                                                echo '<span class="badge badge-success mb-2">Proses Survey</span>';
                                            }  elseif ($data['status'] == 4) {
                                                echo '<span class="badge badge-success mb-2">Dibayar dan Proses Pemasangan</span>';
                                            }  elseif ($data['status'] == 5) {
                                                echo '<span class="badge badge-success mb-2">Pemasangan Selesai</span>';
                                            } ?></td>

                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>

                </tbody>

            </table>
            <br>
            <br>
            <br>
            <div style="text-align:Right; font-weight: bold;">
                <div>Mengetahui</div>
                <br>
                <br>
                <br>
                <br>
                <div>Pimpinan</div>
            </div>
            <script type="text/javascript">
            window.print();
            </script>
</body>

</html>