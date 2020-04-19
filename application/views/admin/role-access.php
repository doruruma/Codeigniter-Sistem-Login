    <!-- Begin Page Content -->
    <div class="container-fluid">
    <div class="flash-data" data-type="<?= $this->session->flashdata('type'); ?>" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800 animated fadeIn slower"><?= $title; ?></h1>

      <div class="row">
        <div class="col-lg-6">
        <h5 class="text-muted">These are Accesses that are allowed for <?= $role['role']; ?></h5>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Menu</th>
                  <th scope="col">Access</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1; ?>
              <?php foreach ($menu as $menu) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $menu['menu']; ?></td>
                  <td>
                    <div class="form-check">
                      <input class="form-check-input access" type="checkbox" <?= check_access($role['id'], $menu['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $menu['id']; ?>">
                    </div>                    
                  </td>
                </tr>
              <?php $i++; ?>
              <?php endforeach; ?>
              </tbody>
            </table>
         </div>
      </div>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; Andra Yuda <?= date('Y'); ?></span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>