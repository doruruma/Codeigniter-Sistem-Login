<div class="container">
  <div class="flash-data" data-type="<?= $this->session->flashdata('type'); ?>" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5 animated fadeIn faster">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900">Change Password for</h1>
                    <h5 class="mb-4"><?= $this->session->userdata('reset_email'); ?></h5>
                  </div>
                  <form class="user" method="post" action="<?= base_url('auth/pass'); ?>">
                    <div class="form-group animated slideInUp">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Your new Password here">
                      <?= form_error('password', '<small class="text-danger ml-3">', '</small>'); ?>
                    </div>
                    <div class="form-group animated slideInUp">
                      <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                      <?= form_error('password2', '<small class="text-danger ml-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block animated slideInUp">
                      Change Password
                    </button>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
