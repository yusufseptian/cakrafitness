<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/dist/css/adminlte.min.css">
</head>
<div class="hold-transition login-page">
<div class="login-box">
      <div class="card">
    <div class="card-body login-card-body">
  <div class="login-logo">
    <a href="<?= base_url(); ?>">Cakra Sport Club</a>
  </div>
  <!-- /.login-logo -->

        <?= form_open('login/cekuser', ['class' => 'formlogin']) ?>
        <?= csrf_field(); ?>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="username" name="us_username" id="us_username" autofocus>
            <div class="invalid-feedback errorUser">                
            </div>
            <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="us_password" id="us_password">
            <div class="invalid-feedback errorPassword">
            </div>
            <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary btn-block btnlogin">Login</button>
        </div>
        <!-- /.col -->
        </div>
        <?= form_close(); ?>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
        <script src="<?= base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url(); ?>/assets/dist/js/adminlte.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.formlogin').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: "post",
                        url: $(this).attr('action'),
                        data: $(this).serialize(),
                        dataType: "json",
                        beforeSend: function() {
                            $('.btnlogin').attr('disable', 'disabled')
                            $('.btnlogin').html('<i class="fa fa-spin fa-spinner"></i>');

                        },
                        complete: function() {
                            $('.btnlogin').attr('disable', false)
                            $('.btnlogin').html('Login');
                        },
                        success: function(response) {
                            if (response.error) {
                                if (response.error.us_username) {
                                    $('#us_username').addClass('is-invalid')
                                    $('.errorUser').html(response.error.us_username);
                                } else {
                                    $('#us_username').removeClass('is-invalid');
                                    $('.errorUser').html('');
                                }

                                if (response.error.us_password) {
                                    $('#us_password').addClass('is-invalid')
                                    $('.errorPassword').html(response.error.us_password);
                                } else {
                                    $('#us_password').removeClass('is-invalid');
                                    $('.errorPassword').html('');
                                }
                            }

                            if (response.sukses) {
                                window.location = response.sukses.link;
                            }

                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + "\n" + xhr.responseText + "\n" +
                                thrownError);

                        }
                    });
                    return false;
                });
            });
        </script>
</body>

</html>