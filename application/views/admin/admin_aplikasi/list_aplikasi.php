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
    <div class="card-body p-0">
      <table class="table col-lg-6">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Aplikasi</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($item as $item) : ?>
            <tr>
              <td><?= $i; ?></td>
              <td><?= $item['nama']; ?></td>
              <td class="text-right py-0 align-middle">
                <div class="btn-group btn-group-sm">
                  <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modal-lihat-aplikasi-<?= $item['id']; ?>"><i class="fas fa-eye"></i></a>
                  <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-edit-aplikasi-<?= $item['id']; ?>"><i class="fas fa-pencil-alt"></i></a>
                  <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-aplikasi-<?= $item['id']; ?>"><i class="fas fa-trash"></i></a>
                </div>
              </td>
            </tr>

            <!-- Modal LIHAT aplikasi -->
            <div class="modal fade" id="modal-lihat-aplikasi-<?= $item['id']; ?>" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 600px;">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Lihat Aplikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- Form Edit -->
                    <form role="form">
                      <div class="card-body " style="margin-top:0; padding-top: 0;margin-bottom:0; padding-bottom: 0">
                        <div class="form-group">
                          <label for="app-name">Nama Aplikasi</label>
                          <span type="text" class="form-control" id="app-name"><?= $item['nama']; ?> </span>
                        </div>
                        <div class="form-group">
                          <label for="app-logo">Logo Aplikasi</label><br>
                          <img style="width: 100px;" src="<?= base_url('assets/img/') . $item['icon']; ?>" alt="<?= $item['nama']; ?>">
                        </div>
                        <div class="form-group ">
                          <label for="app-link">Link Aplikasi</label>
                          <span type="text" class="form-control" id="app-link"><?= $item['link']; ?> </span>
                        </div>
                        <div class="form-group">
                          <label for="app-deskripsi">Deskripsi Aplikasi</label>
                          <span type="text" class="form-control" id="app-deskripsi" style="min-height: 200px;"> <?= $item['deskripsi']; ?></span>

                        </div>

                        <br>
                      </div>
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
            <div class="modal fade" id="modal-edit-aplikasi-<?= $item['id']; ?>" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered mt-0" role="document" style="max-width: 600px;">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Aplikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- Form Edit -->
                    <form role="form" action="<?= base_url('admin/admin_aplikasi/tambah_aplikasi'); ?>" method="post">
                      <div class="card-body" style="margin-top:0; padding-top: 0;margin-bottom:0; padding-bottom: 0">
                        <div class="form-group">
                          <label for="app-name">Nama Aplikasi</label>
                          <input type="text" class="form-control" id="app-name" name="name" value="<?= $item['nama']; ?>">
                        </div>
                        <div class="form-group ">
                          <label for="app-link">Link Aplikasi</label>
                          <input type="text" class="form-control" id="app-link" name="link" value="<?= $item['link']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="app-deskripsi">Deskripsi Aplikasi</label>
                          <textarea type="text" class="form-control" id="app-deskripsi" name="deskripsi" rows="6" value="<?= $item['deskripsi']; ?>"><?= $item['deskripsi']; ?></textarea>
                        </div>

                        <div class="form-group">
                          <label for="app-icon">Logo</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="app-icon" name="icon">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>

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
                    <div class="modal-footer right-content-between">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                    <!-- End Form Edit -->
                  </div>

                </div>
              </div>
            </div>

            <!-- Modal DELETE aplikasi -->
            <div class="modal fade" id="modal-delete-aplikasi-<?= $item['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-delete-aplikasiTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Aplikasi </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body text-danger">
                    Anda yakin akan menghapus <Strong><?= $item['nama']; ?></Strong> dari daftar Portal?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>

                    <a href="<?= base_url(); ?>admin/Admin_list_aplikasi/hapus/<?= $item['id']; ?>"> <button type="button" class="btn btn-danger">Ya, Hapus</button></a>

                  </div>
                </div>
              </div>
            </div>
            <?php $i++; ?>
          <?php endforeach; ?>
    </div>
    </tbody>
    </table>
  </div>
</div>
</div>