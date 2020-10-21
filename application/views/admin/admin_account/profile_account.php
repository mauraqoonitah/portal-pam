<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/admin_home') ?>">Home</a></li>
            <li class="breadcrumb-item active">Profil saya</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="col-sm-6">
      <!-- card profile admin -->
      <div class="card mb-3 mt-3" style="max-width:400px;">
        <div class="row no-gutters">
          <div class="col-md-4 p-2">
            <img src="<?= base_url('assets/template/dist/img/') . $admin['image']; ?>" class="card-img" style="width: 100px;">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h3 class="card-title"><?= $admin['name']; ?></h3>
              <p class="card-text"><?= $admin['email']; ?></p>

              <p class="card-text"><small class="text-muted">Created: <?= $admin['date_created']; ?> </small></p>
            </div>
          </div>
        </div>

        <button type="button" class="btn btn-success ">Edit Profile</button>
      </div>
    </div><!-- /.col -->
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->