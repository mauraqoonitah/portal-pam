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

    <!-- flashdata -->
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
    <!--end flashdata -->

    <div class="card-body p-0">
      <table class="table col-lg-6">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Aplikasi</th>
            <th class="text-right">Action</th>
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
                  <!-- lihat aplikasi -->
                  <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modal-lihat-aplikasi-<?= $item['id']; ?>"><i class="fas fa-eye"></i></a>

                  <!-- edit aplikasi -->
                  <a href="<?= base_url(); ?>admin/Admin_list_aplikasi/edit/<?= $item['id']; ?>" data-toggle="modal" data-target="#modal-edit-aplikasi-<?= $item['id']; ?>" target="_blank" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>

                  <!-- hapus aplikasi -->
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

                    <!-- Form Lihat Aplikasi -->
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
                    <!-- End Form Lihat Aplikasi -->
                  </div>

                </div>
              </div>
            </div>

            <!-- Modal EDIT aplikasi -->
            <div class="modal fade" id="modal-edit-aplikasi-<?= $item['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-edit-aplikasiTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Aplikasi </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Pilih Edit untuk mengubah data dari Aplikasi <Strong><?= $item['nama']; ?></Strong>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>

                    <a href="<?= base_url(); ?>admin/Admin_list_aplikasi/edit/<?= $item['id']; ?>">
                      <button type="button" class="btn btn-info">Edit </button></a>

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

                    <a href="<?= base_url(); ?>admin/Admin_list_aplikasi/hapus/<?= $item['id']; ?>">
                      <button type="button" class="btn btn-danger">Ya, Hapus</button></a>

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