  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url('assets/template/dist') ?>/img/AdminLTELogo.png" alt="Portal PamJaya Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Portal </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/template/dist/img/') ?>default.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin Portal PAM JAYA</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="Admin_home" class="nav-link active">
              <i class="nav-icon fas fa-laptop-house"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
            </ul> -->
          </li>

          <!-- Aplikasi -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-code"></i>
              <p>
                Aplikasi
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Admin_tambah_aplikasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Aplikasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Admin_list_aplikasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Aplikasi</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Berita -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Berita
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Admin_tambah_berita" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Berita</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Admin_list_berita" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Berita</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- /Berita -->


          <!-- Berita -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Account
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Admin_tambah_account" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Account</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Admin_list_account" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Account</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- /Berita -->

          <br>
          <br>
          <br>
          <br>

          <!-- <li class="nav-item" >
                <a href="Admin_list_berita" class="nav-link">
                  <i class="nav-icon fas fa-power-off" style="color:#dc3545;"></i>
                  <p style="color:#dc3545;">Sign Out</p>
                </a>
              </li>
            </ul>
          </li> -->
        </ul>

        <hr>


      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>