<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Pelanggan</h1>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="flash-data-gagal" data-flashdatagagal="<?= $this->session->flashdata('error'); ?>"></div>

    <div class="card mb-3 col-lg-10">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="card-body">
                    <table width="100%" style="font-size:16px">
                        <tr>
                            <td>Nik</td>
                            <td>:</td>
                            <td><?= $user['nik']; ?></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><?= $user['username']; ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td>:</td>
                            <td><?= $user['no_hp']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $user['nama']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?php if ($user['alamat'] == '') {
                                    echo '<span class="badge badge-danger">Lengkapi data</span>';
                                } else {
                                    echo $user['alamat'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Kelurahan</td>
                            <td>:</td>
                            <td><?php if ($user['kelurahan'] == '') {
                                    echo '<span class="badge badge-danger">Lengkapi data</span>';
                                } else {
                                    echo $user['kelurahan'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Kecamatan</td>
                            <td>:</td>
                            <td><?php if ($user['kecamatan'] == '') {
                                    echo '<span class="badge badge-danger">Lengkapi data</span>';
                                } else {
                                    echo $user['kecamatan'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Provinsi</td>
                            <td>:</td>
                            <td><?php if ($user['provinsi'] == '') {
                                    echo '<span class="badge badge-danger">Lengkapi data</span>';
                                } else {
                                    echo $user['provinsi'];
                                } ?></td>
                        </tr>
                    </table>
                    <div class="form-group row justify-content-end mt-3">
                        <div class="col-sm">
                            <a href="<?= base_url('pelanggan/editpelanggan'); ?>" class="btn btn-success">Lengkapi
                                Data</a>
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