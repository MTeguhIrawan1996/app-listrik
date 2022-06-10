<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-bolt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Gerai Dimas<sup></sup></div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php if ($title == ('Halaman Admin')) : ?>
    <li class="nav-item active">
        <?php else : ?>
    <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link pb-0" href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span></a>
    </li>
    <?php if ($title == ('Master Data')) : ?>
    <li class="nav-item active">
        <?php else : ?>
    <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-fw fa-user-friends"></i>
            <span>Master Data</span>
        </a>
        <?php if ($title == ('Master Data')) : ?>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <?php else : ?>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                <?php endif; ?>
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('user'); ?>">Data User</a>
                    <a class="collapse-item" href="<?= base_url('listrik'); ?>">Jenis Listrik</a>
                    <a class="collapse-item" href="<?= base_url('petugas'); ?>">Data Petugas</a>
                </div>
            </div>
    </li>
    <?php if ($title == ('Transaksi')) : ?>
    <li class="nav-item active">
        <?php else : ?>
    <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user-friends"></i>
            <span>Transaksi</span>
        </a>
        <?php if ($title == ('Transaksi')) : ?>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <?php else : ?>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <?php endif; ?>
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('pemasangan'); ?>">Pengajuan Pemasangan</a>
                </div>
            </div>
    </li>

    <?php if ($title == ('Halaman Pelanggan')) : ?>
    <li class="nav-item active">
        <?php else : ?>
    <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link pb-0" href="<?= base_url('pelanggan'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span></a>
    </li>
    <?php if ($title == ('Data Pelanggan')) : ?>
    <li class="nav-item active">
        <?php else : ?>
    <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link pb-0" href="<?= base_url('pelanggan/datapelanggan'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Data Pelanggan</span></a>
    </li>
    <?php if ($title == ('Data Pemasangan')) : ?>
    <li class="nav-item active">
        <?php else : ?>
    <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link pb-0" href="<?= base_url('pelanggan/datapemasangan'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Anjukan Pemasangan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout') ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->