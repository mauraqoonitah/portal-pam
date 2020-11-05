<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
  </ul>




  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?php echo base_url('home') ?>" class="nav-link font-weight-bold">
        Portal PAM JAYA
      </a>
    </li>
    <li class="nav-item d-none d-sm-inline">
      <a href="#" data-toggle="modal" data-target="#logout" class="nav-link font-weight-bold text-danger"><i class="fas fa-power-off"></i>
        Logout
      </a>
    </li>

  </ul>
</nav>
<!-- /.navbar -->

<!-- Modal Logout aplikasi -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body text-danger text-center">
        <h5>Logout from admin?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

        <a href="<?php echo base_url('login/logout') ?>">
          <button type="button" class="btn btn-danger">Logout</button></a>

      </div>
    </div>
  </div>
</div>