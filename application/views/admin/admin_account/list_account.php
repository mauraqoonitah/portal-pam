<div class="content-wrapper">
  <!-- /.card -->
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Daftar Aplikasi Portal PAM Jaya</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
      </div>
    </div>
    <div class="card-body p-0">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Aplikasi</th>
            <th>Role</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Maura</td>
            <td>Admin</td>
            <td class="text-right py-0 align-middle">
              <div class="btn-group btn-group-sm">
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modal-lihat-aplikasi"><i class="fas fa-eye"></i></a>
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-edit-aplikasi"><i class="fas fa-pencil-alt"></i></a>
                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-aplikasi"><i class="fas fa-trash"></i></a>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  <!-- =================================================================================== -->
</div>
<!-- =================================================================================== -->

<!-- Modal LIHAT aplikasi -->
<div class="modal fade" id="modal-lihat-aplikasi" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered  mt-0" role="document" style="max-width: 600px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form lihat -->
        <form role="form">
          <div class="card-body">
            <div class="form-group">
              <label for="app-name">Username</label>
              <input type="text" class="form-control" id="app-name" placeholder="Username" disabled>
            </div>
            <div class="form-group">
              <label for="app-deskripsi">Role</label>
              <input type="text" class="form-control" id="app-deskripsi" placeholder="Role" disabled>
            </div>
            <br>
            <!-- <div class="form-group">
              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                <label for="customRadio1" class="custom-control-label">Khusus berjalan di area PAM Jaya</label>
              </div>
              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" checked>
                <label for="customRadio2" class="custom-control-label">Izinkan berjalan diluar area PAM JAYA</label>
              </div>

            </div> -->
          </div>
          <!-- /.card-body -->
        </form>
        <div class="modal-footer right-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        <!-- End Form Edit -->
      </div>

    </div>
  </div>
</div>


<!-- Modal EDIT aplikasi -->
<div class="modal fade" id="modal-edit-aplikasi" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered mt-0" role="document" style="max-width: 600px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form Edit -->
        <form role="form">
          <div class="card-body">
            <div class="form-group">
              <label for="app-name">Username</label>
              <input type="text" class="form-control" id="app-name" placeholder="Nama Aplikasi">
            </div>
            <div class="form-group ">
              <label for="app-link">Password</label>
              <input type="password" class="form-control" id="app-link" placeholder="Password">
            </div>
            <div class="form-group">
                        <label>Role</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Admin</option>
                            <option>User</option>
                        </select>
                </div>
            
            <br>
           

            </div>
          </div>
          <!-- /.card-body -->
        </form>
        <div class="modal-footer right-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
          <button type="button" class="btn btn-primary">Simpan Perubahan</button>
        </div>
        <!-- End Form Edit -->
      </div>

    </div>
  </div>
</div>

<!-- Modal DELETE aplikasi -->
<div class="modal fade" id="modal-delete-aplikasi" tabindex="-1" role="dialog" aria-labelledby="modal-delete-aplikasiTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Hapus Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Yakin hapus Account ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
        <button type="button" class="btn btn-danger">Hapus</button>
      </div>
    </div>
  </div>
</div>