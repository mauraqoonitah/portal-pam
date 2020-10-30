<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url('admin/Admin_home') ?>" class="brand-link">
    <img src="<?php echo base_url('assets/img/') ?>pamjaya-logo.png" alt="Portal PamJaya Logo" class="brand-image ml-1" style="background-color: white; opacity: .7; border-radius: 5px; ">
    <span class="brand-text font-weight-light">Admin Portal </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('assets/template/dist/img/') . $admin['image']; ?>" class="img-dot-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Hai, <?= $admin['name']; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- query menu -->
        <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu` . `id`, `menu`
                        FROM `user_menu` JOIN `user_access_menu` 
                          ON `user_menu`.`id`= `user_access_menu`.`menu_id`                      
                        WHERE `user_access_menu`.`role_id` = $role_id
                      ORDER BY `user_access_menu`.`menu_id` DESC
                        ";
        $menu = $this->db->query($queryMenu)->result_array();

        ?>

        <!-- LOOPING MENU -->
        <?php foreach ($menu as $m) : ?>

          <div class="header small text-gray ml-2">
            <?= $m['menu']; ?>
          </div>
          <!-- submenu sidebar -->
          <?php
          $menuId = $m['id'];
          $querySubMenu = "SELECT * FROM `user_sub_menu`
                            WHERE `menu_id` = $menuId
                            AND `is_active` = 1
                            ";
          $subMenu = $this->db->query($querySubMenu)->result_array();
          ?>

          <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
              <!-- Akun -->
              <li class="nav-item menu-open">
              <?php else : ?>
              <li class="nav-item">
              <?php endif; ?>
              <a href="<?php echo base_url($sm['url']); ?>" class="nav-link">
                <i class="<?= $sm['icon']; ?>"></i>
                <p>
                  <?= $sm['title']; ?>
                </p>
              </a>
              </li>

            <?php endforeach; ?>
            <div class="user-panel pb-1 mb-3 d-flex"></div>



          <?php endforeach; ?>

          <li class=" nav-link">
            <a href="<?php echo base_url('login/logout') ?>" class="nav-link">
              <i class="fas fa-power-off text-danger"></i>
              <p class=" font-weight-bold text-danger"> Logout </p>
            </a>
          </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>