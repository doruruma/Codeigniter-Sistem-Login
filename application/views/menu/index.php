    <!-- Begin Page Content -->
    <div class="container-fluid">
    <div class="flash-data" data-type="<?= $this->session->flashdata('type'); ?>" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800 animated fadeIn slower"><?= $title; ?></h1>

      <div class="row">
        <div class="col-lg-6">
        <?= form_error('menu', '<div class="alert alert-danger">', '</div>'); ?>
            <a href="" class="btn btn-primary mb-3 btn-add-menu" data-toggle="modal" data-target="#adnmodal"><i class="fas fa-fw fa-plus"></i><span>Add New Menu</span></a>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Menu</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1; ?>
              <?php foreach ($menu as $menu) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $menu['menu']; ?></td>
                  <td>
                    <a href="<?= base_url(); ?>menu/ambilMenu/<?= $menu['id']; ?>" data-target="#adnmodal" data-id="<?= $menu['id']; ?>" data-toggle="modal" class="btn btn-success btn-sm btn-edit-menu"><i class="fas fa-fw fa-edit"></i></a>
                    <a href="<?= base_url(); ?>menu/hapusMenu/<?= $menu['id']; ?>" class="btn btn-danger btn-hapus btn-sm"><i class="fas fa-fw fa-trash-alt"></i></a>
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

<!-- Add new Menu Modal -->
<!-- Button trigger modal -->
<div class="modal fade" id="adnmodal" tabindex="-1" role="dialog" aria-labelledby="adnmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title-menu"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" class="form-mod-menu">
      <div class="modal-body">
          <div class="form-group">
            <label for="menu">Menu</label>
            <input type="text" name="menu" id="menu_menu" class="form-control">
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