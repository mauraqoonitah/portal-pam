<!DOCTYPE html>
<html>


<body class="hold-transition sidebar-mini layout-fixed col-lg-12">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard Admin</h1>
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

              </div>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>15</h3>

                  <p>Aplikasi</p>
                </div>
                <div class="icon">
                  <i class="ion ion-code-working"></i>
                </div>
                <a href="<?= base_url('admin/Admin_list_aplikasi') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>65</h3>
                  <p>Jumlah Berita</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-paper"></i>
                </div>
                <a href="<?= base_url('admin/Admin_list_berita') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->