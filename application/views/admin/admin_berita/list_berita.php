<div class="content-wrapper">

  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title"> Berita Internal Portal PAM Jaya</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
      </div>
    </div>

    <!-- flashdata -->
    <!--end flashdata -->

    <div class="card-body p-0">
      <table class="table">
        <thead>
          <tr>
            <th>No.</th>
            <th>Judul Berita</th>
            <th>Tanggal Posting</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <td>1</td>
            <td>Penggunaan Alfresco untuk PAM JAYA</td>
            <td>6 juni 2020</td>
            <td class="text-right py-0 align-middle">
              <div class="btn-group btn-group-sm">
                <!-- lihat berita -->
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modal-lihat-berita"><i class="fas fa-eye"></i></a>
                <!-- edit berita -->
                <a href="" target="_blank" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                <!-- sembunyikan berita -->
                <a href="" target="_blank" class="btn btn-secondary" data-toggle="modal" data-target="#modal-hide-berita"><i class="fas fa-eye-slash"></i></a>
                <!-- hapus berita -->
                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-berita"><i class="fas fa-trash"></i></a>

              </div>
            </td>

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</div>

<!-- Modal LIHAT berita -->
<div class="modal fade" id="modal-lihat-berita" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered " style="max-width: 600px" role="document" style="max-width: 600px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Lihat berita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form Edit -->
        <form role="form">
          <div class="card-body">
            <div class="form-group">
              <label for="judul-berita">Judul Berita</label>
              <input type="text" class="form-control" id="judul-berita" placeholder="Nama berita" disabled>
            </div>
            <div class="form-group">
              <label for="gambar-berita">Gambar Ilustrasi berita</label>
              <img src="" alt="" id="gambar-berita">
            </div>

            <div class="form-group">
              <label for="konten-berita">Konten Berita</label>
              <input type="text" class="form-control" id="konten-berita" placeholder="Konten Berita" disabled>
            </div>
            <div class="form-group">
              <label for="konten-berita">Tanggal Posting</label>
              <input type="text" class="form-control" id="konten-berita" placeholder="Konten Berita" disabled>
            </div>
            <br>
          </div>
          <!-- /.card-body -->
          <div class="modal-footer right-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </form>
        <!-- End Form Edit -->
      </div>

    </div>
  </div>
</div>

<!-- Modal EDIT berita -->
<div class="modal fade" id="modal-edit-berita" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered " style="max-width: 600px" role="document" style="max-width: 600px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit berita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form Edit -->
        <form role="form">
          <div class="card-body">
            <div class="form-group">
              <label for="judul-berita">Judul Berita</label>
              <input type="text" class="form-control" id="judul-berita" placeholder="Nama berita">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Gambar Illustrasi Berita</label>
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

            <div class="form-group">
              <label for="konten-berita">Konten Berita</label>
              <div class="mb-3">
                <textarea class="textarea" id="konten-berita" placeholder="Describe yourself here..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
            </div>

            <br>

          </div>
          <!-- /.card-body -->
        </form>
        <div class="modal-footer right-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>


        </div>
        <!-- End Form Edit -->
      </div>

    </div>
  </div>
</div>



<!-- Modal DELETE berita -->

<div class="modal fade" id="modal-delete-berita" tabindex="-1" role="dialog" aria-labelledby="modal-delete-beritaTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Hapus berita </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Anda yakin akan menghapus <Strong>(Judul berita)</Strong> dari daftar Portal?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
        <button type="button" class="btn btn-danger">Ya, Hapus</button>
      </div>
    </div>
  </div>

</div>

<!-- Modal HIDE berita -->
<div class="modal fade" id="modal-hide-berita" tabindex="-1" role="dialog" aria-labelledby="modal-hide-beritaTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sembunyikan berita </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Anda yakin menyembunyikan <Strong>(Judul berita)</Strong> dari daftar Portal?<br>
        <small>Berita akan tetap tersimpan di halaman admin</small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
        <button type="button" class="btn btn-danger">Ya, Sembunyikan</button>
      </div>
    </div>
  </div>

</div>