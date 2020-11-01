<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Berita</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>admin/Admin_home">Home</a></li>
            <li class="breadcrumb-item active">Tambah Berita</li>
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
            <a href="<?php echo base_url('berita') ?>" class="nav-link" target="_blank">
              <i class="fas fa-fw fa-chevron-right"></i> Lihat di Portal
            </a>
            <a href="<?php echo base_url('admin/admin_list_berita') ?>" class="nav-link" target="_blank">
              <i class="fas fa-fw fa-chevron-right"></i> Lihat di List Berita
            </a>

          </div>

        </div>
      </div>
    <?php endif; ?>


    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"> </h3>
            </div>

            <?php echo form_open_multipart(base_url('admin/Admin_tambah_berita')) ?>

            <div class="card-body">
              <?php if (validation_errors()) : ?>
                <div class="text-danger">
                  <?= validation_errors(); ?>
                </div>
              <?php endif; ?>

              <div class="form-group">
                <label for="creator">Creator : </label>
                <input readonly type="text" id="creator" name="creator" class="form-control" value="<?= $admin['name']; ?>">
              </div>

              <div class="form-group">
                <label for="publishedAt">Tanggal Posting </label>
                <input readonly type="text" class="form-control" id="publishedAt" name="publishedAt" value="<?= date('d F Y'); ?>">
              </div>

              <div class="form-group mt-4">
                <label for="judul">Judul Berita</label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Berita">
              </div>



              <div class="form-group  mt-5">
                <label for="konten">Konten Berita</label>
                <!-- <textarea type="text" class="textarea form-control" id="konten" name="konten" placeholder="Isi Konten Berita disini..." style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> -->
                <textarea type="text" class="form-control" id="konten" name="konten" placeholder="Isi Konten Berita disini..." rows="5"></textarea>
              </div>

              <fieldset class="form-group">
                <label for="berita-gambar">Gambar Berita</label>
                <div class="row">
                  <!-- unggah gambar -->
                  <div class="col-sm-10">


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
                    <img class=" ml-3 mt-2" style="width: 300px;" src="<?= base_url('assets/img/berita/berita-img.png'); ?>" alt="gambar default">
                    <hr>

                  </div>
                </div>
              </fieldset>


              <div class="modal-footer">
                <button type="submit" name="tambahBerita" class="btn btn-primary">Posting</button>
              </div>
            </div>
          </div>
          <?php echo form_close(); ?>


        </div>
      </div>
    </div>
</div>
</div>
</div>
</section>
</div>