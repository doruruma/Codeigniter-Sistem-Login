    <!-- Begin Page Content -->
    <div class="container-fluid">
    <div class="flash-data" data-type="<?= $this->session->flashdata('type'); ?>" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800 animated fadeIn slower"><?= $title; ?></h1>

      <div class="row">
        <div class="col-sm-6">
          <form action="<?= base_url('user/changepassword'); ?>" method="post">
            <div class="form-group">
              <label for="current_pass">Current Password</label>
              <input type="password" name="current_pass" id="" class="form-control">
              <?= form_error('current_pass', '<small class="text-danger ml-2">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="new_pass1">New Password</label>
              <input type="password" name="new_pass1" id="" class="form-control">
              <?= form_error('new_pass1', '<small class="text-danger ml-2">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="new_pass2">Repeat Password</label>
              <input type="password" name="new_pass2" id="" class="form-control">
              <?= form_error('new_pass2', '<small class="text-danger ml-2">', '</small>') ?>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
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
