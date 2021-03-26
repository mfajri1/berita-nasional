<!-- awal container -->
<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-6 col-lg-6 col-md-6">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                  <?= $this->session->flashdata('pesan') ;?>
                </div>
                <form class="user" action="<?= base_url('auth/login') ;?>" method="post">
                  <div class="form-group">
                    <input type="text" name="username"  class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username">
                    <?= form_error('username', '<div class="text-danger small ml-3">','</div>') ;?>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    <?= form_error('password', '<div class="text-danger small ml-3">','</div>') ;?>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>
                </form>
                <hr>
                <!-- <div class="text-center">
                  <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div> -->
                <div class="text-center">
                  <a class="small" href="<?= base_url('auth/daftar') ;?>">Create an Account!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- akhir card -->

    </div>

  </div>
  <!-- akhir row -->

</div>
<!-- akhir container -->
