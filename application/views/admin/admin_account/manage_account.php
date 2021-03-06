<div class="content-wrapper">
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
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 table-responsive-lg">
                    <?= $this->session->flashdata('message'); ?>
                    <table class="table table-hover ">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" >No.</th>
                                <th scope="col" >Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Active</th>
                                <th scope="col" class="text-center">Manage Akun</th>
                                <th scope="col">Berita</th>
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
                                    <td><?= $akun['email'] ?></td>
                                    <td style="color: grey;"><?= $akun['date_created'] ?></td>
                      
                                  
                                    <td>
                                        <div class="form-check mr-4">
                                            <input class="form-check-input-status" type="checkbox" <?= check_access($akun['is_active']); ?> data-active="<?= $akun['is_active']; ?>" data-id="<?= $akun['id']; ?>">
                                        </div>
                                    </td>
                                    <td  class="text-center">
                                        <div class="form-check mr-4" > 
                                            <input class="form-check-input-role" type="checkbox" <?= check_status($akun['role_id']); ?> data-role="<?= $akun['role_id']; ?>" data-id="<?= $akun['id']; ?>">
                                        </div>
                                    </td>
                                    <!-- berita -->
                                    <td >
                                        <div class="form-check mr-4">
                                            <input class="form-check-input-adminberita" type="checkbox" <?= check_admin_berita($akun['role_id']); ?> data-adminberita="<?= $akun['role_id']; ?>" data-id="<?= $akun['id']; ?>">
                                        </div>
                                    </td>
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
                </div>
                <div class="col-lg-12" style="color: grey; font-size: 16px;">
                    <hr>
                    <h6><strong>Role: </strong></h6>
                    <p>
                    <b>*Active</b> = Izinkan akun untuk akses ke halaman admin<br>
                    <b>*Super Admin</b> = Admin bisa akses Menu Manage Akun<br>
                    <b>*Berita</b> = Admin hanya bisa akses Menu List dan Tambah Berita<br>


                    </p>
                </div>
            </div>
        </div>
    </section>
    <?php echo form_close(); ?>
</div>