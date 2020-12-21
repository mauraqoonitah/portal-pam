<nav class="main-header navbar navbar-expand navbar-white navbar-light">

  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>


  <ul class="navbar-nav ml-auto">

    <li class="nav-item d-none d-sm-inline-block mt-1">
      <img src="<?php echo base_url('assets/img/') ?>pamjaya-logo.png" alt="Portal PamJaya Logo" style="  border-radius: 5px;width: 50px ">
      </a>
    </li>

    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?php echo base_url('home') ?>" target="_blank" class="nav-link font-weight-bold" style="color: #006efd">
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