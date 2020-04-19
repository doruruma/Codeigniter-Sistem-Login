    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800 animated fadeIn slower"><?= $title; ?></h1>

      <div class="row">
        <div class="col-lg-8">
          <?= form_open_multipart('user/edit'); ?>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input class="form-control" type="email" value="<?= $user['email']; ?>" name="email" id="email" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label" >Name</label>
              <div class="col-sm-10">
                <input class="form-control" value="<?= $user['name']; ?>" type="text" name="name" id="name">
                <?= form_error('name', '<small class="text-danger ml-3">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">Picture</div>
              <div class="col-sm-10">
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?= base_url('assets/img/profile/' . $user['image']); ?>" class="img-thumbnail">
                  </div>
                  <div class="col-sm-9">
                    <div class="custom-file">
                      <input type="file" name="image" id="image" class="custom-file-input">
                      <label for="image" class="custom-file-label">Choose</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
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
