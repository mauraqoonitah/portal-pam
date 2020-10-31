<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Akun</h1>
                </div>

                <div class="col-sm-6  mb-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/admin_home') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Manage Akun</li>
                    </ol>
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
                                <th scope="col">Super Admin</th>
                                <th scope="col">Active</th>
                                <!-- <th scope="col">role_id</th>
                                <th scope="col">is_active</th> -->
                                <th scope="col">Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php echo form_open_multipart() ?>
                            <?php $i = 1; ?>
                            <?php foreach ($adminAkun as $akun) : ?>

                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $akun['name'] ?></td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input-role" type="checkbox" <?= check_status($akun['role_id']); ?> data-role="<?= $akun['role_id']; ?>" data-id="<?= $akun['id']; ?>">

                                        </div>

                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input-status" type="checkbox" <?= check_access($akun['is_active']); ?> data-active="<?= $akun['is_active']; ?>" data-id="<?= $akun['id']; ?>">
                                        </div>
                                    </td>
                                    <!-- <td><?= $akun['role_id'] ?></td>
                                    <td><?= $akun['is_active'] ?></td> -->
                                    <td>

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
                    <div class="col-lg-8 mt-5" style="color: grey;">
                        <h6><strong>Role: </strong></h6>
                        <p class="">*Super Admin = Access Menu Manage Akun <br>*Active = Aktivasi akun setelah registrasi untuk masuk ke halaman admin</p>
                    </div>

                </div>
            </div>
        </div>

    </section>
    <?php echo form_close(); ?>

    <!-- /.content -->
</div>