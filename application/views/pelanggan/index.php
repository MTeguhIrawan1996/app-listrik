<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"></h1>

    <marquee>Selamat datang Pelanggan</marquee>

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Biaya Pemasangan
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php if (empty($pengajuan['harga'])) {
                                            echo '0';
                                        } else {
                                            echo 'Rp.' . number_format($pengajuan['harga']) . ',-';
                                        } ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Biaya Lain-Lain
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php if (empty($pembayaran['harga_lain'])) {
                                            echo '0';
                                        } else {
                                            echo 'Rp.' . number_format($pembayaran['harga_lain']) . ',-';
                                        } ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pembayaran
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php if (empty($pembayaran['total'])) {
                                            echo '0';
                                        } else {
                                            echo 'Rp.' . number_format($pembayaran['total']) . ',-';
                                        } ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->