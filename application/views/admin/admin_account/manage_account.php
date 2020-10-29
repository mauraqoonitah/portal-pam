<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Akun</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/admin_home') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Manage Akun</li>
                    </ol>
                </div>
                <div class="col-lg-8 ">
                    <p>Hanya yang punya status Admin yang bisakonfigurasi akun seperti menghapus, menambah, mengedit, dan mengaktifkan status akun</p>
                    <p>Ubah status akun member menjadi Admin dengan cara ceklis kolom admin</p>
                    <p>Aktifkan akun dengan ceklis kolom active</p>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <?= $this->session->flashdata('message'); ?>


                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Admin</th>
                                <th scope="col">Status Active</th>
                                <th scope="col">role_id</th>
                                <th scope="col">is_active</th>
                                <th scope="col">Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($adminAkun as $akun) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $akun['name'] ?></td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" <?= check_status($akun['role_id']); ?> data-role="<?= $akun['role_id']; ?>">
                                        </div>

                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" <?= check_access($akun['is_active']); ?> data-active="<?= $akun['is_active']; ?>">
                                        </div>
                                    </td>
                                    <td><?= $akun['role_id'] ?></td>
                                    <td><?= $akun['is_active'] ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/admin_manage_account/account_access/') . $akun['id']; ?>" class="badge badge-warning">access</a>

                                        <a href="" class="badge badge-danger" data-toggle="modal" data-target="#modal-delete-account-<?= $akun['id']; ?>">delete</a>


                                    </td>
                                </tr>
                                <!-- Modal DELETE account -->
                                <div class=" modal fade" id="modal-delete-account-<?= $akun['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-delete-accountTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Account</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin hapus account <Strong><?= $akun['name'] ?></Strong> dari daftar Admin?
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>

                                                <a href="<?= base_url(); ?>admin/Admin_manage_account/hapusAccount/<?= $akun['id']; ?>">
                                                    <button type="button" class="btn btn-danger">Ya, Hapus</button></a>

                                            </div>



                                        </div>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="" class="btn btn-primary mb-3 mt-5" data-toggle="modal" data-target="#newRoleModal">Tambah Akun Admin</a>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Add Menu -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Tambah Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('admin/Admin_manage_account'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="akun">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>