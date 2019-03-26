@extends('loginpart.header')
@section('content')

<style type="text/css">

/*
 * Page: Login & Register
 * ----------------------
 */
.login-logo,
.register-logo {
  font-size: 35px;
  text-align: center;
  margin-bottom: 25px;
  font-weight: 300;
}
.login-logo a,
.register-logo a {
  color: #444;
}
.login-page,
.register-page {
  background: #d2d6de;
}
.login-box,
.register-box {
  width: 360px;
  margin: 7% auto;
}
@media (max-width: 768px) {
  .login-box,
  .register-box {
    width: 90%;
    margin-top: 20px;
  }
}
.login-box-body,
.register-box-body {
  background: #fff;
  padding: 20px;
  border-top: 0;
  color: #666;
}
.login-box-body .form-control-feedback,
.register-box-body .form-control-feedback {
  color: #777;
}
.login-box-msg,
.register-box-msg {
  margin: 0;
  text-align: center;
  padding: 0 20px 20px 20px;
}
.social-auth-links {
  margin: 10px 0;
}

</style>

<section class="section-padding">
    <div class="container">
    <div class="row">

      <div class="col-md-12">
        <div class="login-box">
          <div class="login-box-body">
            <p class="login-box-msg">Daftar</p>
            <div class="form-group">
                <form action="{{url('daftaruser')}}" id="register" name="register" method="post">
                  {{csrf_field()}}
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Nama Lengkap" id="namalengkap" name="namalengkap" required>
                    <span class="fa fa-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" id="alamat" name="alamat" required>
                    <span class="fa fa-envelope form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                    <span class="fa fa-lock form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Confirm Password" id="confirmPassword" name="confirmPassword" required>
                    <span class="fa fa-lock form-control-feedback"></span>
                  </div>
                  <input type="hidden" class="form-control" value="{{ $id_group_user }}" id="id_group_user" name="id_group_user" required>
                  <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12">
                      <button type="submit" class="btn btn-primary btn-block btn-flat" name="btnregis" id="btnregis">Daftar</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>
            </div>
          </div>
        </div>

      </div>
  


  
</div> <!-- /account-container -->




</div>
  </section>

<!--<script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>-->
  <script src="js/custom.js"></script>
  <script src="js/bootstrapValidator.js"></script>
  <script src="toastr/js/toastr.min.js"></script>

<script type="text/javascript">

$(function () {
    $('#register').bootstrapValidator({
        message: 'Text Harus Diisi',
        feedbackIcons: {
            valid: 'fa fa-ok',
            invalid: 'fa fa-remove',
            validating: 'fa fa-refresh'
        },
        fields: {
          trigger: 'change keyup',
            'option[]': {
                validators: {
                    notEmpty: {
                        message: 'Text Harus Diisi'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Email Harus Diisi'
                    },
                    emailAddress: {
                        message: 'Email Tidak Valid'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Password Harus Diisi'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'Password Tidak Sama'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'Confirm Password Harus Diisi'
                    },
                    identical: {
                        field: 'password',
                        message: 'Password Tidak Sama'
                    }
                }
            }
        }
    });


    var batal = "<?php echo Session::get('flash-message1'); ?>";
    if (batal == "error") {
        //
        //bootbox.alert("Email dan Password anda salah.");
        var status = "error";
        var pesan = "Email sudah dipakai oleh pengguna lain. Harap menggunakan email yang lain.";

        Command: toastr[status](pesan);
    }

});

</script>

@endsection