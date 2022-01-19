<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="google" content="notranslate">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>

  <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="javascript:void(0);">Aplikasi Admin Sebaran Lokasi WIFI</a>
        </div>
        <p class="login-box-msg"><?= $this->session->flashdata('message');?></p>

    <div class="card card-info">
      <form class="login-box-body" action="" method="post">
        <div class="card-body">
          <div class="form-group row">
            <label for="Username" class="col-sm-4 col-form-label">Username</label>
            <div class="col-sm-8">
              <input type="text" name="username" value="" id="username" class="form-control" placeholder="Your Username">
            </div>
          </div>
          <div class="form-group row">
            <label for="Password" class="col-sm-4 col-form-label">Password</label>
            <div class="col-sm-8">
              <input type="password" name="password" value="" id="password" class="form-control" placeholder="Your Password">
            </div>
          </div>
            <button type="submit" name="login" value="Login" class="btn btn-primary float-right">Sign in</button>
          </div>
          <!-- <div class="col-sm-10">
            <p>Belum punya akun?
                <a href="<?= base_url('Auth_Registrasi'); ?>">Buat Akun</a>
            </p>
          </div> -->
        </div>
      </form>
    </div>



    <script src="<?= base_url('assets/'); ?>frameworks/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/icheck/js/icheck.min.js"></script>
    <script>
        $(function(){
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
        });
    </script>

  </body>
</html>
