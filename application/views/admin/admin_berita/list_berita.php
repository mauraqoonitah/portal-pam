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
    <?php if ($this->session->flashdata('flash')) : ?>
      <div class="row mt-3">
        <div class="col-lg-8">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Berita <strong>berhasil </strong><?= $this->session->flashdata('flash'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <a href="<?php echo base_url('berita') ?>" class="nav-link" target="_blank">
              <i class="fas fa-fw fa-chevron-right"></i> Lihat di Portal
            </a>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <!--end flashdata -->


    <div class="card-body p-0">
      <table class="table">
        <thead>
          <tr>
            <th>No.</th>
            <th>Judul Berita</th>
            <th>Tanggal Posting</th>
            <th>Action</th>

          </tr>

        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($berita as $berita) : ?>
            <tr>
              <td><?= $i; ?></td>
              <td><?= $berita['judul']; ?></td>
              <td><?= $berita['publishedAt']; ?></td>
              <td class="text-right py-0 align-middle">
                <div class="btn-group btn-group-sm">
                  <!-- lihat berita -->
                  <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modal-lihat-berita"><i class="fas fa-eye"></i></a>
                  <!-- edit berita -->
                  <a href="<?= base_url(); ?>admin/Admin_list_berita/edit/<?= $berita['id']; ?>" data-toggle="modal" data-target="#modal-edit-berita-<?= $berita['id']; ?>" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                  <!-- sembunyikan berita -->
                  <a href="" target="_blank" class="btn btn-secondary" data-toggle="modal" data-target="#modal-hide-berita"><i class="fas fa-eye-slash"></i></a>
                  <!-- hapus berita -->
                  <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-berita"><i class="fas fa-trash"></i></a>

                </div>
              </td>
            </tr>

            <!-- Modal LIHAT berita -->
            <div class="modal fade" id="modal-lihat-berita" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-dialog-centered " role="document" style="max-width: 600px;">
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
                          <div class="card">
                            <div class="card-body">
                              <p id="judul-berita"><?= $berita['judul']; ?></p>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="konten-berita">Tanggal Posting</label>
                          <div class="card">
                            <div class="card-body">
                              <p id="tanggal-berita"><?= $berita['publishedAt']; ?></p>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="gambar-berita">Gambar Ilustrasi berita</label><br>
                          <div class="card">
                            <div class="card-body">
                              <img style="width: 100px;" src="<?= base_url('assets/img/') . $berita['gambar']; ?>" alt="<?= $berita['gambar']; ?>">
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="konten-berita">Deskripsi Berita</label>
                          <div class="card">
                            <div class="card-body">
                              <p id="deskripsi-berita"> Deskripsi singkat</p>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="konten-berita">Konten Berita</label>
                          <div class="card">
                            <div class="card-body">
                              <p id="konten-berita"> <?= $berita['konten']; ?></p>
                            </div>
                          </div>
                          <br>
                        </div>
                        <!-- /.card-body -->
                        <div class="modal-footer right-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </form>
                    <!-- End Form Edit -->
                  </div>

                </div>

              </div>
            </div>
    </div>

    <!-- Modal EDIT Berita -->
    <div class="modal fade" id="modal-edit-berita-<?= $berita['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-edit-beritaTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit Berita </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Ubah data Berita <Strong><?= $berita['judul']; ?></Strong>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>

            <a href="<?= base_url(); ?>admin/Admin_list_berita/edit/<?= $berita['id']; ?>">
              <button type="button" class="btn btn-info">Edit </button></a>

          </div>
        </div>
      </div>
    </div>

    <!-- Modal DELETE berita -->
    <div class="modal fade" id="modal-delete-berita" tabindex="-1" role="dialog" aria-labelledby="modal-delete-beritaTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"><?= $berita['judul']; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body font-weight-bold">
            Hapus berita dari daftar portal?
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
            <h5 class="modal-title" id="exampleModalLongTitle"><?= $berita['judul']; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <b>Sembunyikan berita ini dari daftar berita portal?<br></b>
            <small>Berita akan tetap tersimpan di halaman admin</small>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
            <button type="button" class="btn btn-danger">Ya, Sembunyikan</button>
          </div>
        </div>
      </div>
    </div>
    <?php $i++; ?>
  <?php endforeach; ?>
  </tbody>
  </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

</div>