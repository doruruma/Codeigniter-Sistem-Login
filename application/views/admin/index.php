    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800 animated fadeIn slower"><?= $title; ?></h1>
      <div class="row">

        <div class="col-md-12 col-lg-4 col-sm-12 mt-2">
          <div class="card shadow" style="border-left: solid blue;">
            <div class="col-md-8">
              <div class="card-body">
                <h3 class="card-title">Users<i class="fas text-primary fa-user fa-fw ml-2"></i></h3>
                <h4 class="card-text"><?= $users; ?></h4>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12 col-lg-4 col-sm-12 mt-2">
          <div class="card shadow" style="border-left: solid blue;">
            <div class="col-md-8">
              <div class="card-body">
                <h3 class="card-title">Menu<i class="fas text-primary fa-folder fa-fw ml-2"></i></h3>
                <h4 class="card-text"><?= $menu; ?></h4>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12 col-lg-4 col-sm-12 mt-2">
          <div class="card shadow" style="border-left: solid blue;">
            <div class="col-md-8">
              <div class="card-body">
                <h3 class="card-title">Submenu<i class="fas text-primary fa-folder-open fa-fw ml-2"></i></h3>
                <h4 class="card-text"><?= $submenu; ?></h4>
              </div>
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
