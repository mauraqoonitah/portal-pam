<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Aplikasi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/admin_home') ?>">Home</a></li>
            <li class="breadcrumb-item active">Tambah Aplikasi</li>
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

            <?php echo form_open_multipart('admin/Admin_tambah_aplikasi') ?>
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
                  <input type="text" class="form-control" id="app-name" name="name" placeholder="Nama Aplikasi">
                </div>

                <div class="form-group">
                  <label for="app-link">Link Aplikasi</label>
                  <input type="text" class="form-control" id="app-link" name="link" placeholder="Link Aplikasi">
                </div>
                <div class="form-group">
                  <label for="app-deskripsi">Deskripsi aplikasi</label>
                  <div class="mb-3">
                    <input type="text" class="form-control" id="app-deskripsi" name="deskripsi" placeholder="deskripsi singkat aplikasi" style="height: 100px;"></input>
                  </div>
                </div>
                <div class="form-group">
                  <label for="app-icon">Logo</label>

                  <!-- upload -->
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="icon" name="icon">
                      <label class="custom-file-label" for="icon">Choose file</label>
                    </div>
                    <!-- <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div> -->

                    <!-- end upload -->

                  </div>
                </div>
                <br>
                <div class="form-group">
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                    <label for="customRadio1" class="custom-control-label">Khusus berjalan di area PAM Jaya</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" checked>
                    <label for="customRadio2" class="custom-control-label">Izinkan berjalan diluar area PAM JAYA</label>
                  </div>

                </div>
              </div>
              <!-- /.card-body -->
              <div class="modal-footer ">
                <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
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