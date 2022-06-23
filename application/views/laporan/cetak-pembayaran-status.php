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
            <h1>Laporan Pembayaran By Status</h1>
            <div class="kiri" style="text-align:left;">
                <div>Kuala Kapuas,<?= date('d-m-Y'); ?></div>
                <div>Print Oleh,<?= $user['nama']; ?></div>
            </div>
            <div class="kanan" style="text-align:right;">
                <div>Data Pembayaran</div>
            </div>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Pembayaran</th>
                        <th>Kode Pengajuan</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Biaya Lain Lain</th>
                        <th>Total</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($laporan as $data) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $data['kode_pembayaran']; ?></td>
                        <td><?= $data['kode_pengajuan']; ?></td>
                        <td><?= date('d F Y', strtotime($data['tgl_pembayaran'])); ?></td>
                        <td><?= 'Rp.' . number_format($data['harga_lain']) . ',-'; ?></td>
                        <td><?= 'Rp.' . number_format($data['total']) . ',-'; ?></td>
                        <td><?php if ($data['status'] == 0) {
                                echo '<span class="badge badge-warning mb-2">Belum Lunas</span>';
                            } elseif ($data['status'] == 1) {
                                echo '<span class="badge badge-success mb-2">Lunas</span>';
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