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
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Aplikasi</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"> </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form">
              <div class="card-body">
                <!-- Form Edit -->
                <form role="form">
                  <div class="card-body">
                    <div class="form-group mt-0">
                      <label for="exampleInputEmail1">Nama Aplikasi</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nama Aplikasi">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Link Aplikasi</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Link Aplikasi">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Deskripsi aplikasi</label>
                      <div class="mb-3">
                        <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Logo</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <!-- <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div> -->
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
                </form>
                <div class="modal-footer ">
                  <button type="button" class="btn btn-primary">Simpan</button>
                </div>
                <!-- End Form Edit -->
              </div>
              <!-- /.card-body -->


            </form>
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