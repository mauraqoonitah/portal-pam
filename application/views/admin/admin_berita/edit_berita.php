<!-- Content Wrberitaer. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Berita</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Admin_home') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Berita</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Berita <strong>berhasil </strong><?= $this->session->flashdata('flash'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <a href="<?php echo base_url('home') ?>" class="nav-link" target="_blank">
                            <i class="fas fa-fw fa-chevron-right"></i> Lihat di Portal
                        </a>
                        <a href="<?php echo base_url('Admin/Admin_list_berita') ?>" class="nav-link" target="_blank">
                            <i class="fas fa-fw fa-chevron-right"></i> Lihat di List Berita
                        </a>
                    </div>

                </div>
            </div>
        <?php endif; ?>


        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-lg-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <?php echo form_open_multipart() ?>
                        <input type="hidden" name="id" value="<?= $berita['id']; ?>">

                        <div class="card-body">
                            <!-- Form Edit -->
                            <div class="card-body">
                                <?php if (validation_errors()) : ?>
                                    <div class="text-danger">
                                        <?= validation_errors(); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group mt-0 ">
                                    <div class="form-group mt-0 ">
                                        <label for="berita-creator">Creator</label>
                                        <input readonly type="text" class="form-control" id="berita-creator" name="creator" value="<?= $berita['creator']; ?>">
                                    </div>
                                    <div class="form-group mt-0 ">
                                        <label for="berita-publishedAt">Tgl Posting</label>
                                        <input readonly type="text" class="form-control" id="berita-publishedAt" name="publishedAt" value="<?= $berita['publishedAt']; ?>">
                                    </div>

                                    <div class="form-group mt-0 ">
                                        <label for="berita-judul">Judul Berita</label>
                                        <input type="text" class="form-control" id="berita-judul" name="judul" value="<?= $berita['judul']; ?>"> </div>


                                    <div class="form-group mt-0">
                                        <label for="berita-konten">Konten Berita</label>
                                        <div class="mb-3">
                                            <textarea name="konten" class="form-control text-left" id="berita-konten" rows="15">
                                        <?= $berita['konten']; ?>
                                        </textarea>

                                        </div>

                                        <fieldset class="form-group">
                                            <label for="berita-gambar">Gambar Berita</label>
                                            <div class="row">
                                                <!-- unggah gambar -->
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <img style="width: 300px;" src="<?= base_url('assets/img/berita/') . $berita['gambar']; ?>" alt="<?= $berita['judul']; ?>">
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gambarImageRadios" id="uploadgambarRadios" value="uploadgambarRadios" checked="checked">
                                                        <label class="form-check-label  mb-2" for="uploadgambarRadios">
                                                            Unggah Gambar Baru
                                                        </label>

                                                        <!-- upload -->
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                                                <label class="custom-file-label" for="gambar">Choose file</label>
                                                            </div>
                                                            <!-- end upload -->
                                                        </div>

                                                        <small class="form-text text-muted">
                                                            jenis format gambar (.png/.jpg/.jpeg) dan maksimal size 2MB
                                                        </small>

                                                    </div>

                                                    <!-- gambar default -->
                                                    <div class="form-check mt-4">
                                                        <input class="form-check-input" type="radio" name="gambarImageRadios" id="uploadDefgambarRadios" value="uploadDefgambarRadios">
                                                        <label class="form-check-label" for="uploadDefgambarRadios">
                                                            Gunakan gambar Default
                                                        </label>
                                                    </div>
                                                    <img class=" ml-3 mt-2" style="width: 300px;" src="<?= base_url('assets/img/berita/berita-img.png'); ?>" alt=" gambar default">
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
<!-- /.content-wrberitaer -->