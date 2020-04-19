<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion animated fadeInLeft" id="accordionSidebar" style="background:#000">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-code"></i>
    </div>
    <div class="sidebar-brand-text mx-3">WPU Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <?php
  // looping menu
  $role_id = $this->session->userdata('role_id');
  $query_menu = "SELECT `user_menu`.`id`, `menu` FROM `user_menu` JOIN `user_access_menu`
                 ON `user_menu`.`id` = `user_access_menu`.`menu_id` WHERE `user_access_menu`.`role_id` = $role_id
                 ORDER BY `user_access_menu`.`menu_id`";  //ASC
  $menu = $this->db->query($query_menu)->result_array();
  ?>

  <!-- Heading -->
  <?php foreach ($menu as $menu) : ?>
  <div class="sidebar-heading">
    <?= $menu['menu']; ?>
  </div>

  <?php
  //looping sub-menu
  $query_submenu = "SELECT * FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                    WHERE user_sub_menu.menu_id = {$menu['id']}
                    AND `user_sub_menu`.`is_active` = 1";
  $submenu = $this->db->query($query_submenu)->result_array();
  ?>

    <?php foreach ($submenu as $submenu) : ?>
    <?php if ($title == $submenu['title']) : ?>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item animated fadeInLeft active">
    <?php else : ?>
      <li class="nav-item animated fadeInLeft">
    <?php endif; ?> 
      <a class="nav-link pb-0" href="<?= base_url($submenu['url']); ?>">
        <i class="<?= $submenu['icon']; ?>"></i>
        <span class="fadeIn"><?= $submenu['title']; ?></span>
      </a>
    </li>
    <?php endforeach; ?>
    <!-- Divider -->  
    <hr class="sidebar-divider mt-3">

  <?php endforeach; ?>

  <!-- Nav Item Log out -->
  <li class="nav-item animated fadeInLeft">
    <a href="<?= base_url('auth/logout'); ?>"  class="nav-link btn-logout">
      <i class="fas fa-sign-out-alt fa-fw"></i>
      <span>Log Out</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->
