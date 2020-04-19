    <!-- Begin Page Content -->
    <div class="container-fluid">
    <div class="flash-data" data-type="<?= $this->session->flashdata('type'); ?>" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800 animated fadeIn slower"><?= $title; ?></h1>

      <div class="row">
        <div class="col-lg-6">
        <?= form_error('menu', '<div class="alert alert-danger">', '</div>'); ?>
            <a href="" class="btn btn-primary mb-3 btn-add-role" data-toggle="modal" data-target="#adnmodal"><i class="fas fa-fw fa-plus"></i><span>Add New Menu</span></a>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Role</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1; ?>
              <?php foreach ($role as $role) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $role['role']; ?></td>
                  <td>
                    <a href="<?= base_url(); ?>admin/roleAccess/<?= $role['id']; ?>" class="btn btn-secondary btn-sm"><i class="fas fa-fw fa-cogs"></i></a>
                    <a href="<?= base_url(); ?>admin/ambilrole/<?= $role['id']; ?>" data-target="#adnmodal" data-id="<?= $role['id']; ?>" data-toggle="modal" class="btn btn-success btn-sm btn-edit-role"><i class="fas fa-fw fa-edit"></i></a>
                    <?php if ($role['role'] == 'Administrator') : ?>
                      <a href="<?= base_url(); ?>admin/hapusrole/<?= $role['id']; ?>" class="btn btn-danger disabled btn-hapus btn-sm"><i class="fas fa-fw fa-trash-alt"></i></a>
                    <?php else : ?>
                      <a href="<?= base_url(); ?>admin/hapusrole/<?= $role['id']; ?>" class="btn btn-danger btn-hapus btn-sm"><i class="fas fa-fw fa-trash-alt"></i></a>
                    <?php endif; ?>

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
        <h5 class="modal-title" id="modal-title-role"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" class="form-mod-role">
      <div class="modal-body">
          <div class="form-group">
            <label for="role">Role</label>
            <input type="text" name="role" id="role_role" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times"></i></button>
        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-check"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>