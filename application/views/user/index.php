    <!-- Begin Page Content -->
    <div class="container-fluid">
    <div class="flash-data" data-type="<?= $this->session->flashdata('type'); ?>" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800 animated fadeIn slower"><?= $title; ?></h1>
      <div class="card mb-3 shadow animated fadeInUp" style="max-width: 540px; border-left: solid blue;">
        <div class="row no-gutters">
          <div class="col-md-8">
            <img src="<?= base_url('assets/img/profile/' . $user['image']); ?>" class="card-img mx-2 my-2">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $user['name']; ?></h5>
              <p class="card-text"><?= $user['email']; ?></p>
              <p class="card-text"><small class="text-muted">Member Since <?= date('d F Y', $user['date_created']); ?></small></p>
            </div>
          </div>
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