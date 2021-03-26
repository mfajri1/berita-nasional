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
                  <h1 class="h4 text-gray-900 mb-4">Daftar Akun!</h1>
                </div>
                <form class="user" action="<?= base_url('auth/daftarAksi') ;?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                      <?= form_error('email', '<div class="text-danger small ml-3">','</div>') ;?>
                    </div>
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" placeholder="Username">
                      <?= form_error('username', '<div class="text-danger small ml-3">','</div>') ;?>
                    </div>
                  </div>
                    
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                      <?= form_error('password', '<div class="text-danger small ml-3">','</div>') ;?>
                    </div>
                    <div class="col-sm-6">
                      <input type="password" name="password2" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                    </div>
                  </div>

                  <div class="form-group">
                    <input type="text" name="jabatan" class="form-control form-control-user" id="exampleInputEmail" placeholder="Jabatan">
                    <?= form_error('jabatan', '<div class="text-danger small ml-3">','</div>') ;?>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                    Register Account
                  </button>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="<?= base_url('auth') ;?>">Login!</a>
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
