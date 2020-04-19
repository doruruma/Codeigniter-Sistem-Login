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
                    <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                  </div>
                  <form class="user" method="post" action="<?= base_url('auth'); ?>">
                    <div class="form-group animated slideInUp">
                      <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                      <?= form_error('email', '<small class="text-danger ml-3">', '</small>'); ?>
                    </div>
                    <div class="form-group animated slideInUp">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                      <?= form_error('password', '<small class="text-danger ml-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block animated slideInUp">
                      Login
                    </button>
                  </form>

                  <hr class="animated slideInUp">

                  <div class="text-center animated slideInUp">
                    <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
                  </div>
                  <div class="text-center animated slideInUp">
                    <a class="small" href="<?= base_url('auth/regist'); ?>">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
