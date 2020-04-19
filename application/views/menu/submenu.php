    <!-- Begin Page Content -->
    <div class="container-fluid">
    <div class="flash-data" data-type="<?= $this->session->flashdata('type'); ?>" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800 animated fadeIn slower"><?= $title; ?></h1>

      <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
            <div class="alert alert-danger">
              <?= validation_errors(); ?>
            </div>
            <?php endif ?>
            <a href="" class="btn-add-submenu btn btn-primary mb-3" data-toggle="modal" data-target="#adsubmodal"><i class="fas fa-fw fa-plus"></i><span>Add New SubMenu</span></a>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Menu</th>
                  <th scope="col">Url</th>
                  <th scope="col">Icon</th>
                  <th scope="col">Active</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1; ?>
              <?php foreach ($submenu as $submenu) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $submenu['title']; ?></td>
                  <td><?= $submenu['menu']; ?></td>
                  <td><?= $submenu['url']; ?></td>
                  <td><?= $submenu['icon']; ?></td>
                  <?php if ($submenu['is_active'] == 1) {
                    $status = "Yes";
                  } else {
                    $status = 'No';
                  }
                  ?>
                  <td><?= $status; ?></td>
                  <td>
                    <a href="<?= base_url('menu/ambilSubmenu/' . $submenu['id']); ?>" data-id="<?= $submenu['id']; ?>" data-target="#adsubmodal" data-toggle="modal" class="btn btn-success btn-sm btn-edit-submenu"><i class="fas fa-fw fa-edit"></i></a>
                    <a href="<?= base_url('menu/hapusSubmenu/' . $submenu['id']); ?>" class="btn btn-danger btn-hapus btn-sm"><i class="fas fa-fw fa-trash-alt"></i></a>
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

<!-- Add new subMenu Modal -->
<div class="modal fade" id="adsubmodal" tabindex="-1" role="dialog" aria-labelledby="adsubmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adnmodal"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" class="form-mod-submenu" method="post">
      <div class="modal-body">
          <div class="form-group">
            <label for="title">Submenu Title</label>
            <input type="text" name="title" id="title" class="form-control">
          </div>
          <div class="form-group">
            <label for="Menu">Menu</label>
            <select name="menu_id" id="menu_id" class="form-control" required>
                <option value="" selected disabled>Select Menu</option>
                <?php foreach ($menu as $menu) : ?>
                <option value="<?= $menu['id']; ?>"><?= $menu['menu']; ?></option>
                <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="url">Url</label>
            <input type="text" name="url" id="url" class="form-control">
          </div>
          <div class="form-group">
            <label for="icon">Submenu Icon</label>
            <input type="text" name="icon" id="icon" class="form-control">
          </div>
          <div class="form-group">
            <div class="form-check">
                <input type="checkbox" value="1" name="is_active" class="form-check-input" checked>
                <label for="is_active" class="form-check-label">Active?</label>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times"></i></button>
        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-check"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>