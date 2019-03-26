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
            <p class="login-box-msg">Masuk</p>
            <div class="form-group">
              <form name="loginForm" action="{{url('verifyuser')}}" id="loginForm" method="POST">
                {{csrf_field()}}
                <div class="form-group has-feedback">
                  <!----- username -------------->
                  <input class="form-control" placeholder="Username" id="loginid" type="email" name="username" autocomplete="off" />
                  <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
                  <!---Alredy exists  ! -->
                  <span class="fa fa-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <!----- password -------------->
                  <input class="form-control" placeholder="Password" id="loginpsw" type="password" name="password" autocomplete="off" />
                  <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
                  <!---Alredy exists  ! -->
                  <span class="fa fa-lock form-control-feedback"></span>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <button type="submit" class="btn btn-green btn-block btn-flat">Masuk</button>
                    <br>
                    <p class="text-center">Atau</p>

                    <a class="btn btn-primary btn-block btn-flat" href="daftar">Daftar</a>
                  </div>
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
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>-->
  <script src="js/bootstrapValidator.js"></script>
  <script src="toastr/js/toastr.min.js"></script>

<script type="text/javascript">

$(function () {
    $('#loginForm').bootstrapValidator({
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
            }
        }
    });

    var batal = "<?php echo Session::get('flash-message1'); ?>";
    if (batal == "error") {
        //
        //bootbox.alert("Email dan Password anda salah.");
        var status = "error";
        var pesan = "Email dan Password anda salah.";

        Command: toastr[status](pesan);
    }

});

</script>

  @endsection