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
            <<img src="<?= base_url('assets/img/pln.png') ?>" style="height: 110px" ; width="auto">
        </div>
        <br>
        <div id="kop" class="clearfix">
            <div>GERAI DIMAS</div>
            <div>KAPUAS</div>
            <div>KALIMANTAN TENGAH</div>
            <div style="font-size: 10px;">Jalan S.Parman Gg Kalimantan II Kuala kapuas Email:dimass@gmail.com</div>
        </div>
        <header class="clearfix">
            <h1>Laporan Rekap Kas</h1>
            <div class="kiri" style="text-align:left;">
                <div>Kuala Kapuas,<?= date('d-m-Y'); ?> </div>
                <div>Print Oleh,<?= $user['nama']; ?> </div>
            </div>
            <div class="kanan" style="text-align:right;">
                <div>Data Rekap Kas</div>
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
                        <th>Kode Pembayaran</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Biaya Lain Lain</th>
                        <th>Total</th>
                    </tr>

                    <?php $i = 1; ?>
                    <?php foreach ($laporan as $data) : ?>
                    <tr>
                        <td align="center"><?= $i; ?></td>
                        <td align="center"><?= $data['kode_pembayaran']; ?></td>
                        <td align="center"><?= date('d-m-Y', strtotime($data['tgl_pembayaran'])) ?></td>
                        <td align="center"><?= 'Rp.' . number_format($data['harga_lain']) . ',-'; ?></td>
                        <td align="center"><?= 'Rp.' . number_format($data['total']) . ',-'; ?></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                    <tr>
                        <th colspan="4" style="text-align:center;    font-size:20px">Grand Total</th>
                        <th style="text-align:right; font-size:17px"><?= 'Rp.' . number_format($jumlah) . ',-'; ?></th>

                    </tr>
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