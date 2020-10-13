<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Aplikasi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/admin_home') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Aplikasi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="row mt-3">
                <div class="col-lg-8">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Aplikasi <strong>berhasil </strong><?= $this->session->flashdata('flash'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <a href="<?php echo base_url('home') ?>" class="nav-link" target="_blank">
                            <i class="fas fa-fw fa-chevron-right"></i> Lihat di Portal
                        </a>
                    </div>

                </div>
            </div>
        <?php endif; ?>


        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-lg-8">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <?php echo form_open_multipart() ?>
                        <input type="hidden" name="id" value="<?= $item['id']; ?>">

                        <div class="card-body">
                            <!-- Form Edit -->
                            <div class="card-body">
                                <?php if (validation_errors()) : ?>
                                    <div class="text-danger">
                                        <?= validation_errors(); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group mt-0 ">
                                    <label for="app-name">Nama Aplikasi</label>
                                    <input type="text" class="form-control" id="app-name" name="name" value="<?= $item['nama']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="app-link">Link Aplikasi</label>
                                    <input type="text" class="form-control" id="app-link" name="link" value="<?= $item['link']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="app-deskripsi">Deskripsi Aplikasi</label>
                                    <div class="mb-3">
                                        <textarea name="deskripsi" class="form-control text-left" id="app-deskripsi">
                                        <?= $item['deskripsi']; ?>
                                        </textarea>

                                    </div>

                                    <fieldset class="form-group">
                                        <label for="app-icon">Logo Aplikasi</label>
                                        <div class="row">
                                            <!-- unggah logo -->
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <img style="width: 100px;" src="<?= base_url('assets/img/') . $item['icon']; ?>" alt="<?= $item['nama']; ?>">
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="iconImageRadios" id="uploadIconRadios" value="uploadIconRadios" checked="checked">
                                                    <label class="form-check-label  mb-2" for="uploadIconRadios">
                                                        Unggah Logo Baru
                                                    </label>

                                                    <!-- upload -->
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="icon" name="icon">
                                                            <label class="custom-file-label" for="icon">Choose file</label>
                                                        </div>
                                                        <!-- end upload -->
                                                    </div>

                                                    <small class="form-text text-muted">
                                                        jenis format gambar (.png/.jpg/.jpeg) dan maksimal size 2MB
                                                    </small>

                                                </div>

                                                <!-- logo default -->
                                                <div class="form-check mt-4">
                                                    <input class="form-check-input" type="radio" name="iconImageRadios" id="uploadDefIconRadios" value="uploadDefIconRadios">
                                                    <label class="form-check-label" for="uploadDefIconRadios">
                                                        Gunakan Logo Default
                                                    </label>
                                                </div>
                                                <img class=" ml-3 mt-2" style="width: 100px;" src="<?= base_url('assets/img/item_default.png'); ?>" alt=" logo default">
                                                <hr>

                                            </div>
                                        </div>
                                    </fieldset>

                                </div>
                                <!-- /.card-body -->
                                <div class="modal-footer ">
                                    <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                                </div>
                                <!-- End Form Edit -->
                            </div>
                            <!-- /.card-body -->
                            <?php echo form_close(); ?>

                        </div>
                        <!-- /.card -->
                    </div>


                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->